<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable=['name','email','message'];
}
