<?php
namespace App\General;


//this class is used to return data and title to the page returned by the route
//it must be included in the Controller class which is extended by user defined child classes
use Illuminate\Support\Facades\Config; //title-config file is used to return default fornt part of the title i.e laravel12pm

trait General{
    public $data=[];

public function data($key,$value=null){
    if(!isset($value)) return false;
    return $this->data[$key]=$value;
}
    public function title($back,$separator=' :: ',$front=null){
        if(!isset($front)){
            $front=Config::get('title.name');
        }
        return $front.$separator.ucfirst($back);
    }

}