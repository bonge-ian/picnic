<?php

namespace App\Services\Booking\Filters;

use App\Services\Booking\Filters\Contracts\Filterable;
use App\Services\Booking\SlotGeneratorService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class BookedFilter implements Filterable
{
    public function __construct(private Collection $bookings)
    {
    }

    public function apply(SlotGeneratorService $slot_generator, CarbonPeriod $interval): void
    {
        $interval->addFilter(
            callback: function (Carbon $slot) use ($slot_generator): bool {
                foreach ($this->bookings as $booking) {
                    $is_slot_between_booked_time = $slot->between(
                        date1: $booking->date->setTimeFrom($booking->starts_at->subMinutes($slot_generator->package->duration->totalMinutes)),
                        date2: $booking->date->setTimeFrom($booking->ends_at)
                    );

                    if ($is_slot_between_booked_time) {
                        return false;
                    }
                }

                return true;
            }
        );
    }
}
