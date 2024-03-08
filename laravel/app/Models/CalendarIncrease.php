<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CalendarIncrease extends Model
{
    use HasFactory;
    protected $table = 'CalendarIncrease';
    protected $fillable = [
        'id',
        'study_id',
        'date',
        'class_subject_id',
        'room_id'
    ];
    public function ClassSubject(): BelongsTo
    {
        return $this->BelongsTo(ClassSubject::class);
    }
    public function Room(): BelongsTo
    {
        return $this->BelongsTo(Room::class);
    }
    public function Study(): BelongsTo
    {
        return $this->BelongsTo(Study::class);
    }
}
