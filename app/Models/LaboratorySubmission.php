<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaboratorySubmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lecture() : BelongsTo
    {
        return $this->belongsTo(\App\Models\Lecture::class, 'lecture_id');
    }

    public function student() : BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
