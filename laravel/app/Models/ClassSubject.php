<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassR;
use App\Models\Semester;

class ClassSubject extends Model
{
    use HasFactory;

    protected $table = 'class_subjects';

    protected $fillable = [
        'user_id',
        'class_r_id',
        'subject_id',
        'semester_id',
        'status',
        'created_at',
        'updated_at'

    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ClassR(): BelongsTo
    {
        return $this->belongsTo(ClassR::class);
    }

    public function Subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function Semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

}
