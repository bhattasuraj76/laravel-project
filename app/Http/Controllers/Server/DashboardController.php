<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends ServerController
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->data('title',$this->title('admin'));
        return view('Server.Pages.dashboard',$this->data);
    }
}
