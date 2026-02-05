<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = [];

    protected $casts = [
        'details' => 'array',
        'skills' => 'array',
        'hobbies' => 'array',
    ];
}
