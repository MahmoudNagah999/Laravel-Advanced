<?php

namespace App\Listeners;

use App\Events\newProductMail;
use App\Mail\productMailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendProductEmail
{
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
     * @param  \App\Events\newProductMail  $event
     * @return void
     */
    public function handle(newProductMail $event)
    {
        Mail::to(['mahmoudnagah999@gmail.com'])->send(new productMailable($event->product));
    }
}
