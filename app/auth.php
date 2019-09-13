<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auth extends Model
{
    protected $table = 'auth';
    protected $fillable = ['username','password','status'];
}
