<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Notifications\ProductOrderedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class OrderCreatedEmailNotification
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
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        Notification::route('mail', 'rocoutp@gmail.com')
            ->notify(new ProductOrderedNotification($event->order));
    }
}
