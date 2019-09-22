<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $fillable = ['id','type','list','amount','description','receipt','username','status','created_at','updated_at'];
}
