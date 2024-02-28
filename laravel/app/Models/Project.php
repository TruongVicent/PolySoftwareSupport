<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'user_id',
        'project_type_id',
        'project_img_id',
        'status'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ProjectType(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function ProjectImg(): BelongsTo
    {
        return $this->belongsTo(ProjectImg::class);
    }
}
