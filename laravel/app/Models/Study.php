<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CalendarIncrease;
class Study extends Model
{
    use HasFactory;
    protected $table = 'study';

    protected $fillable = [
        'name',
    ];
    public function CalendarIncrease(): HasMany
    {
        return $this->HasMany(CalendarIncrease::class);
    }
}
