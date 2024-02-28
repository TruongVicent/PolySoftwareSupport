<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_current',
        'status',
        'created_at',
        'updated_at',
    ];
    public function link():HasMany{
        return $this->hasMany(Link::class);
    }
}
