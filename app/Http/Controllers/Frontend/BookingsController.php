<?php

namespace App\Http\Controllers\Frontend;

use App\Events\BookingCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Addon;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Unavailablity;
use App\Services\Booking\Filters\BookedFilter;
use App\Services\Booking\Filters\UnavailabilityFilter;
use App\Services\Booking\SlotGeneratorService;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class BookingsController extends Controller
{
    public function index(Request $request): Response
    {
        $packages = Package::query()
            ->get(['id', 'name', 'slug', 'price', 'currency', 'overview', 'image_url', 'people_range'])
            ->map(fn (Package $package) => Arr::except($package->toArray(), ['price', 'currency']));

        $addons = Addon::query()
            ->get(['id', 'name', 'price', 'currency'])
            ->map(fn (Addon $addon) => Arr::except($addon->toArray(), ['price', 'currency']));

        return Inertia::render(
            component: 'Booking',
            props: compact('packages', 'addons')
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Booking $booking, Request $request)
    {
        if ($request->input('token') !== $booking->token) {
            throw new AuthorizationException();
        }

        if ($booking->cancelled_at) {
            return to_route('pages.index')->with('error', 'You cannot access the booking as it was cancelled already.');
        }

        $booking->loadMissing(relations: [
            'package:id,slug,name,image_url,price,currency',
            'addons:id,price,currency,name',
        ]);

        return Inertia::render(
            component: 'ShowBooking',
            props: compact('booking')
        );
    }

    public function store(BookingRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $package = Package::query()->findOrFail($request->input('package'));

            $start = CarbonImmutable::createFromTimestamp($request->input('selected_time'));
            $end = $start->addMinutes($package->duration->cascade()->totalMinutes);

            $booking = $package->bookings()->create([
                'date' => $request->input('selected_date'),
                'email' => $request->input('email'),
                'price' => $request->input('total'),
                'phone' => $request->input('phone'),
                'starts_at' => $start->toTimeString(),
                'ends_at' => $end->toTimeString(),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'notes' => $request->input('notes'),
                //                'additional_hours' => $request->input('selected_date'),
                'preferred_location' => $request->input('preferred_location'),
            ]);

            $request->whenFilled(key:'addons', callback: fn ($input) => $booking->addons()->attach($input));

            DB::commit();

            BookingCreated::dispatch($booking);

            return to_route(route:'bookings.show', parameters: [
                'booking' => $booking,
                'token' => $booking->token,
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error(message: 'Booking failed.', context: ['data' => [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]]);

            return back()->withErrors(['booking_failed' => "We couldn't process your booking. Kindly try again later"]);
        }
    }

    public function generateTimeSlots(Request $request, Package $package)
    {
        $request->validateWithBag(
            errorBag: 'errors',
            rules:  Package::rules($package)
        );

        $slots = (new SlotGeneratorService(
            package: $package,
            selected_date: $request->date('selected_date'),
            additional_hours: $request->whenFilled(
                key: 'additional_hours',
                callback: fn () => $request->input('additional_hours'),
                default: fn () => null,
            )
        ))->through([
            new UnavailabilityFilter(Unavailablity::query()->get()),
            new BookedFilter(Booking::query()->get()),
        ])->getInterval();

        $time = [];

        foreach ($slots as $slot) {
            $time[$slot->timestamp] = $slot->format('g:i A');
        }

        return $time;
    }

    public function cancel(Booking $booking, Request $request): RedirectResponse
    {
        $booking->touch(attribute: 'cancelled_at');

        // send notification to admin. and also customer.

        return to_route('pages.index')->with('status', 'Your booking has been cancelled');
    }
}
