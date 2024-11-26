<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher() : BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function lecture_exams() : HasMany
    {
        return $this->hasMany(\App\Models\LectureExam::class);
    }
}
