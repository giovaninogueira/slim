<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

/**
 * Class Dev
 * @package App\Models]
 */
class Dev extends Model
{
    protected $table = 'dev';
    protected $hidden = ['updated_at','created_at'];
    protected $fillable = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at'
    ];
}