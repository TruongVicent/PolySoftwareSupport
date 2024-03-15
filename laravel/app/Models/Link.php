<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'thumbnail',
        'semester_id',
        'created_at',
        'updated_at',
    ];
    public function semester():BelongsTo{
        return $this->BelongsTo(Semester::class);
    }
}
