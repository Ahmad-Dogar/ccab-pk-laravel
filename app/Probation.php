<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probation extends Model
{
    protected $fillable = [
        'name', 'duration'
    ];
}
