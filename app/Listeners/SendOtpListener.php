<?php

namespace App\Listeners;

use App\Events\SendOTP;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOtpListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendOTP $event): void
    {
        \Log::info($event->user);
    }
}
