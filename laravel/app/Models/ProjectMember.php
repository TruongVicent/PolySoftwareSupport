<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProjectMember extends Model
{
    use HasFactory;

    protected $table = 'project_members';
    protected $fillable = [
        'project_id',
        'user_id',
        'role',
        'status'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
