<?php

namespace App\Http\Controllers\Server;

use App\Model\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends ServerController
{
    public function index(){
        $this->data('menuData', Menu::orderBy('id', 'desc')->get());
        $this->data('title',$this->title('Menus'));
        return view($this->pagePath.'menus',$this->data);
    }

    public function addMenu(Request $request){
        if($request->isMethod('get')){
            return view($this->pagePath.'addMenu',$this->data);
        }
        $data['menu']=$request->menu;
        if(Menu::create($data)){
            return redirect()->route('addMenu')->with('success','Menu was inserted');
        }
    }

    public function deleteMenu(Request $request){
        if (!$request->mid) {
            return redirect()->back();
        }
        $menuId = $request->mid;
        if (Menu::find($menuId)->where('id', $menuId)->delete()) {
            return redirect()->route('menus')->with('success', 'Menu was deleted');
        }
        return redirect()->back();


    }

}
