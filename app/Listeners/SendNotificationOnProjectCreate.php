<?php

namespace App\Listeners;

use App\Events\ProjectCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class SendNotificationOnProjectCreate
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
     * @param  ProjectCreatedEvent  $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        Mail::to($event->project->owner->email)->send(new ProjectCreated($event->project)); //change send to que later

    }
}
