<?php

namespace App\Http\Controllers\Server;

use App\Model\Category;
use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends ServerController
{
    public function index()
    {
        $this->data('postData', Post::orderBy('id', 'desc')->get());
        $this->data('title', $this->title('Post'));
        return view($this->pagePath . 'posts', $this->data);
    }

    public function addPost(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title',$this->title('addPost'));
            $this->data('catData',Category::all());
            return view($this->pagePath . 'addPost', $this->data);
        }
        $data['cat_id'] = $request->cat_id;
        $data['title'] = $request->title;
        $data['metatitle'] = $request->metatitle;
        $data['article'] = $request->article;
        $data['user_id'] = Auth::user()->id;
        if (Post::create($data)) {
            return redirect()->route('addPost')->with('success', 'Post was inserted');
        }
    }

    public function editPost(Request $request)
    {
        $postId = $request->pid;
        $postData= Post::find($postId);
        $postData=$postData->where('id',$postId)->get();
        $postData=$postData[0];
        $this->data('title',$this->title('editPost'));
        $this->data('postData',$postData);
        return view($this->pagePath.'editPost',$this->data);
    }

    public function editPostAction(Request $request){
        if ($request->isMethod('get')) {
            return redirect()->route('posts');
        }
        $postId = $request->pid;
        $data['title'] = $request->title;
        $data['article'] = $request->article;
        if(Post::find($postId)->where('id',$postId)->update($data)) {
            return redirect()->route('posts')->with('success', 'Post was updated');
        }
        return redirect()->back();
    }

    public function deletePost(Request $request)
    {
        if (!$request->pid) {
            return redirect()->back();
        }
        $postId = $request->pid;
        if (Post::find($postId)->where('id', $postId)->delete()) {
            return redirect()->route('posts')->with('success', 'Post was deleted');
        }
        return redirect()->back();

    }
}
