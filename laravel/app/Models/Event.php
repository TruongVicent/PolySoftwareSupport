<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'image',
        'content',
        'event_type_id',
        'start_time',
        'end_time',
        'target_audience',
        'status',
        'created_at',
        'updated_at'
    ];

    public function EventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

}
