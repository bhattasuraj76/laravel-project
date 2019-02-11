<?php

namespace App\Http\Controllers\Server;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends ServerController
{
    public function index()
    {
        $this->data('userData', User::orderBy('id', 'desc')->get());
        $this->data('title', $this->title('Users'));
        return view($this->pagePath . 'users', $this->data);
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->title('Add User'));
            return view($this->pagePath . 'addUser', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request,
                [
                    'name' => 'required|min:3',
                    'username' => 'required|min:3|unique:users,username',
                    'email' => 'required|min:6|unique:users,email',
                    'password' => 'required|min:4|confirmed',
                    'user_type' => 'required',
                    'upload' => 'required|mimes:jpg,gif,png,jpeg',
                    [
                        'username.required' => 'Username must be inserted nigga'
                    ]
                ]);
            $userData['name'] = $request->name;
            $userData['username'] = $request->username;
            $userData['email'] = $request->email;
            $userData['password'] = bcrypt($request->password);
            $userData['user_type'] = $request->user_type;

            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                if (!file_exists('images')) {
                    mkdir('images');
                }
                $uploadPath = public_path('images/');
                if ($image->move($uploadPath, $imageName)) {
                    $userData['image'] = $imageName;
                }
                //this is used to resize the image keeping the aspect ratio same
                $imagePath = $uploadPath . $imageName;
                $img = Image::make($imagePath)->resize(400, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->save($imagePath);

                //$img = Image::make($imagePath)->resize(100, 100)->save($imagePath);
                //this method crops the user image
            }
            if (User::create($userData)) {
                return redirect()->route('addUser')->with('success', 'User was inserted');
            }

            return redirect()->back();

        }
    }

    public function deleteWithImage($id)
    {
        $userId = $id;
        $userData = User::find($userId);
        $image = $userData->image;
        $imagePath = public_path('images/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }

    public function deleteUser(Request $request)
    {
        if (!$request->uid) {
            return redirect()->back();
        }
        $userId = $request->uid;
        if ($this->deleteWithImage($userId) && User::find($userId)->where('id', $userId)->delete()) {
            return redirect()->route('users')->with('success', 'User was deleted');
        }
        return redirect()->back();
    }

    public function editUser(Request $request)
    {
        if (!$request->uid) {
            return redirect()->back();
        }
        $userId = $request->uid;
        $userData = User::find($userId);
        $this->data('userData', $userData);
        $this->data('title', $this->title('Edit User'));
        return view($this->pagePath . 'editUser', $this->data);
    }

    public function editUserAction(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->title('Add User'));
            return view($this->pagePath . 'users', $this->data);
        }
        if ($request->isMethod('post')) {
            $userId = $request->uid;
            $this->validate($request,
                [
                    'name' => 'required|min:3',
                    'username' => 'required|min:3', [
                    Rule::unique('users', 'username')->ignore($userId)
                ],
                    'email' => 'required|min:6', [
                    Rule::unique('users', 'email')->ignore($userId)
                ],
                    'user_type' => 'required',
                    'upload' => 'mimes:jpg,gif,png,jpeg',
                    [
                        'username.required' => 'Username must be inserted nigga',
                        'email.required' => 'Email must be inserted nigga'
                    ]
                ]);
            $userData['name'] = $request->name;
            $userData['username'] = $request->username;
            $userData['email'] = $request->email;
            $userData['user_type'] = $request->user_type;
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                if (!file_exists('images')) {
                    mkdir('images');
                }
                $uploadPath = public_path('images/');
                if ($image->move($uploadPath, $imageName) && $this->deleteWithImage($userId)) {
                    $userData['image'] = $imageName;
                }
                //maintains the aspect ratio but redefines the size
                $imagePath = $uploadPath . $imageName;
                $img = Image::make($imagePath)->resize(400, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($imagePath);
            }
            if (User::where('id', $userId)->update($userData)) {
                return redirect()->route('users')->with('success', 'User was updated');
            }

            return redirect()->back();

        }
    }

    public function userTypeChanger(Request $request)
    {
        if ($request->isMethod('post')) {
            $userId = $request->uid;
            $userData = User::find($userId);
            if (!$request->has('status')) {
                return redirect()->back();
            }
            if ($userData->user_type === 'admin') {
                $data['user_type'] = 'user';
                $message = 'User is now user';
            } else {
                $data['user_type'] = 'admin';
                $message = 'User is now admin';
            }
            if ($userData::where('id', $userId)->update($data)) {
                return redirect()->route('users')->with('success', $message);
            }
            return redirect()->back();
        }
    }

    public function userSearch(Request $request)
    {
        if ($request->isMethod('get') || empty($request->user_data)) {
            return redirect()->back();
        }
        $userData = $request->user_data;
        $allUsers = User::where('name', 'LIKE', "%$userData%")->get();
        $this->data('userData', $allUsers);
        $this->data('title', $this->title('Users'));
        return view($this->pagePath . 'users', $this->data);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->serverPath . '.Login.login');
        }
        $username = $request->username;
        $password = $request->password;
        $remember = isset($request->remember) ? true : false;
        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            return redirect()->intended('admin');
        }
        return redirect()->back()->with('success', 'Credentials not matched, Nigga');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
