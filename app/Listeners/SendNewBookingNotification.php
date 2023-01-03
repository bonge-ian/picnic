<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\NewBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewBookingNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public int $delay = 20;

    public bool $afterCommit = true;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BookingCreated $event): void
    {
        Mail::to(users: config('wonderland.mail.admin.address'))
            ->cc('info@bonge-inc.co.ke')
            ->send(mailable:
                new NewBooking($event->booking->loadMissing(relations:[
                    'package:id,name,slug',
                    'addons:id,name',
                ]))
            );
    }
}
