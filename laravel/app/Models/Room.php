<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CalendarIncrease;
class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function CalendarIncrease(): HasMany
    {
        return $this->HasMany(CalendarIncrease::class);
    }
}
