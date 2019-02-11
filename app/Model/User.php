<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

//whenever we make custom authtentication we mush register Auth\User class
// and change congig/auth file app/user class to app/modeluser

class User extends Auth
{
   protected $fillable=['name','username','email','password','user_type','image'];
}
