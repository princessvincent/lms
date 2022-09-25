<?php

namespace App\Models;

use App\Models\submittedtask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class task extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'course',
        'level',
        'track',
        'description',
        'points',
        'deadline',
        
    ];

    /**
     * Get the user that owns the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the submittedtask that owns the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submittedtask()
    {
        return $this->hasOne(submittedtask::class, 'task_id', 'id');
    }
}
