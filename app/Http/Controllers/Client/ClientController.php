<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public $clientPath='Client';
    public $pagePath='';

    public function __construct(){
        $this->data('title',$this->title('welcome'));
        $this->pagePath=$this->clientPath.'.Pages.';
    }
}
