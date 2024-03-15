<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'credits',
        'description',
        'link_document',
        'status',
        'created_at',
        'updated_at'
    ];

    public function Semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function Link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
    public function ClassSubject(): HasMany
    {
        return $this->HasMany(ClassSubject::class);
    }
}
