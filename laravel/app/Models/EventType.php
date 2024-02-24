<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EventType extends Model
{
    use HasFactory;

    protected $table = 'event_types';

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    public function Event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
