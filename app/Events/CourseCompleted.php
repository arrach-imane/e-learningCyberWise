<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\CoursesModel;

class CourseCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $course;

    public function __construct(User $user, CoursesModel $course)
    {
        $this->user = $user;
        $this->course = $course;
    }
}
