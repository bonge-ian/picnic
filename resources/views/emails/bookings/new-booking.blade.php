<x-mail::header :url="config('app.url')">
	<p align="center" style="text-align: center" ><a href="{{config('app.url')}}" target="_blank"><img src="{{Vite::asset('resources/images/logo.svg')}}" width="100"></a></p>
</x-mail::header>

<x-mail::message>
# New Booking

Hello.

We've received a new booking from **{{ $booking->first_name . ' ' . $booking->last_name }}**

Below, you will find a summary of **{{ $booking->first_name . ' ' . $booking->last_name }}**'s recent booking.


----------------------------------------


## Billing Details

----------------------------------------
<x-mail::table>
	|   	|   	|
	| :--------	| --------:	|
	| **Customer Name** 	|   {{ $booking->first_name . ' ' . $booking->last_name }} 	|
	| **Customer Email**   	|  {{ $booking->email }}   	|
	| **Customer phone**   	|   {{ $booking->phone }} 	|

</x-mail::table>

-------------------------------------------
## Booking Summary
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

@if ($booking->notes)
<x-mail::panel>
### Custom instructions
{{ $booking->notes }}
</x-mail::panel>
@endif

@if ($booking->addons->isNotEmpty())
### Booking addons
@foreach($booking->addons as $addon)
- {{ $addon->name }}
@endforeach
@endif

#### Contact
<div class="row">
	<x-mail::button url="tel:{{$booking->phone}}" color="success">Contact via phone</x-mail::button>
	<x-mail::button url="mailto:{{$booking->email}}">Contact via email</x-mail::button>
</div>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
