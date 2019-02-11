<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerController extends Controller
{
    public $serverPath='Server';
    public $pagePath='';


    public function __construct(){
        $this->data('title',$this->title('dashboard'));
        $this->pagePath=$this->serverPath.'.Pages.';
    }
}
