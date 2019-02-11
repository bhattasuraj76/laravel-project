<?php

namespace App\Http\Controllers\Client;

use App\Model\Menu;
use App\Model\Post;
use App\Model\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends ClientController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data('title', $this->title('home'));
        $postData = Post::all();
        $menuData = Menu::all();
        $this->data('postData', $postData);
        $this->data('menuData', $menuData);
        return view($this->pagePath . 'home', $this->data);
    }

    public function about()
    {
        $menuData = Menu::all();
        $this->data('menuData', $menuData);
        $this->data('title', $this->title('about'));
        return view($this->pagePath . 'about', $this->data);
    }

    public function blog(Request $request)
    {
        $blogId = $request->bid;
        $blogData = Post::find($blogId);
        $postData = Post::orderBy('id', 'desc')->paginate(3);
        $menuData = Menu::all();
        $this->data('menuData', $menuData);
        $this->data('blogData', $blogData);
        $this->data('postData', $postData);
        $this->data('title', $this->title('Blog'));
        return view($this->pagePath . 'blog', $this->data);
    }

    public function subscribe(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('home');
        }
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        $this->validate($request, [
            'email' => 'required|min:8|email|unique:subscribers,email'
        ]);
        $postData = Post::all();
        $menuData = Menu::all();
        $this->data('postData', $postData);
        $this->data('menuData', $menuData);
        if (Subscriber::create($data)) {
            return redirect()->route('home')->with('success', 'You are subscribed for nigga');
        }
        return redirect()->route('home');
    }

    public function contact(Request $request){
        if($request->isMethod('get')){
            $menuData = Menu::all();
            $this->data('menuData', $menuData);
            return view($this->pagePath.'contact',$this->data);
        }
    }

    public function login()
    {
        $this->data('title', $this->title('Login'));
        return redirect()->route('login');
    }
}
