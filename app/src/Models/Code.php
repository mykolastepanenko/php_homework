<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'url',
        'code'
    ];

    public $timestamps = false;
}