<x-mail::message>
# Verify your booking

Hi **{{ $booking->first_name . ' ' . $booking->last_name }}**.

Thank you for letting us be the one to revitalize a memorable experience amongst you and your loved ones.

You recently booked a one of our picnic packages, [{{ $booking->package->name }}]({{ route('pages.packages', ['selected_package' => $booking->package->slug])}}).

**Below, you will find a summary of your recent booking.**

-------------------------------------------
The booking details are as follows:

-------------------------------------------

<x-mail::table>
	|   	|   	|
	| :--------	| --------:	|
	| **Package** 	|   {{ $booking->package->name }} 	|
	| **Date**   	|  {{ $booking->formatted_date }}   	|
	| **Start time**   	|   {{ $booking->formatted_starts_at }} 	|
	| **End time**  	|   {{ $booking->formatted_ends_at }} 	|
	| **Total**  |    {{ $booking->formatted_price }} 	|

</x-mail::table>

-------------------------------------------

@if ($booking->addons->isNotEmpty())
### Booking addons
@foreach($booking->addons as $addon)
- {{ $addon->name }}
@endforeach
@endif

<x-mail::button url="{{ route('bookings.show', ['token' => $booking->token, 'booking' => $booking->hash]) }}" color="primary">
View Booking.
</x-mail::button>

One of our **marketing representatives**, will contact you **shortly** to confirm and finalize your booking details.


If you would like to cancel the booking, then click the action button below:
<x-mail::button :url="route('bookings.cancel', $booking->hash)" color="error">
	Cancel Booking.
</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
