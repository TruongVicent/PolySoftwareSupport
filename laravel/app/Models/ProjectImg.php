<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImg extends Model
{
    use HasFactory;

    protected $table = 'project_images';
    protected $fillable = [
        'name',
        'image',
        'date',
        'project_id',
        'status'];

    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}
