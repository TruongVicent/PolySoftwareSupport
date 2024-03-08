<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wordpress extends Model
{
    use HasFactory;

    protected $table = 'wordpress_resources';

    protected $fillable = [
        'name',
        'file',
        'thumbnail',
        'version',
        'type',
        'status',
        'created_at'
    ];
}
