<?php

namespace App\Events\Job\ApplyJobEvent;

use App\Models\Job\Job;
use App\Models\User\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplyJobEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $job;
    public $applicant;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($job_id,$applicant_id)
    {
        $this->job    = Job::find($job_id);
        $this->applicant     = User::find($applicant_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
