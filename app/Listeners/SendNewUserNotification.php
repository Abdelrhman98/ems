<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\database;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::select('*')
            ->where('auth', 'admin')
            ->get();
            Notification::send($admins, new database($event->user));
    }
}
