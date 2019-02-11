<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';

    protected $guarded=['id'];

    public function users(){
       return $this->belongsTo('App\Model\User','user_id');
    }

    public function cats(){
        return $this->belongsTo('App\Model\Category','cat_id');
    }


}
