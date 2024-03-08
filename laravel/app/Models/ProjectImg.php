<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
>>>>>>> origin/Toan

class ProjectImg extends Model
{
    use HasFactory;
<<<<<<< HEAD
}
=======

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

>>>>>>> origin/Toan
