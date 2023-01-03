<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\VerifyBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBookingVerificationNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public int $delay = 10;

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
     * @param  BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        Mail::to(users: $event->booking->email)
            ->send(mailable: new VerifyBooking(
                $event->booking->loadMissing(relations:[
                    'package:id,name,slug',
                    'addons:id,name',
                ])
            ));
    }
}
