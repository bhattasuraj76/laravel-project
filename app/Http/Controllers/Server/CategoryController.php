<?php

namespace App\Http\Controllers\Server;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends ServerController
{
   public function index(){
       $this->data('catData', Category::orderBy('id', 'desc')->get());
       $this->data('title',$this->title('Category'));
       return view($this->pagePath.'categories',$this->data);
   }

    public function addCategory(Request $request){
        if($request->isMethod('get')){
            return view($this->pagePath.'addCategory',$this->data);
        }
        $data['title']=$request->title;
        if(Category::create($data)){
            return redirect()->route('addCategory')->with('success','Category was inserted');
        }
    }

    public function deleteCategory(Request $request){
        if (!$request->cid) {
            return redirect()->back();
        }
        $catId = $request->cid;
        if (Category::find($catId)->where('id', $catId)->delete()) {
            return redirect()->route('category')->with('success', 'Cat was deleted');
        }
        return redirect()->back();


    }

}
