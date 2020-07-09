<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // protected $primaryKey = 'status';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'status'
    ];
}
