<?php

namespace App\Models;

use App\Models\task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class submittedtask extends Model
{
    use HasFactory;
protected $fillable = [
    'user_id',
    'task_id',
    'student_id',
    'link',
    'course',
    'track', 
    'feedback',
    'feedback_by',
    'status',
    'time',
];

    /**
     * Get the task that owns the submittedtask
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(task::class, 'task_id', 'id');
    }
}
