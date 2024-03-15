<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'project_type_id',
        'banner',
        'status'
    ];


    public function User(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function ProjectType(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function Project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function ProjectMember(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }


}
