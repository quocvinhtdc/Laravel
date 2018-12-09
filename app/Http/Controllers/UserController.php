<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getList()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('backend.user.listUser', ['user' => $user]);
    }

     public function getAdd()
    {
        return view('backend.user.addUser');
    }

     public function postAdd(UserRequest $request)
    {
        $user = new User();
        $user->name      = $request->txtuser;
        $user->email = $request->txtEmail;
        $user->password      = Hash::make($request->txtPassWord);
        $user->remember_token  = $request->_token;
        $user->role      = $request->role;
        $user->phone      = $request->txtPhone;
        $user->save();
        // trở về trang list category
        return redirect()->route('admin.user.list');
    }

    public function getDelete($id)
    {
        $user_current = Auth::user()->id;
        $user = User::find($id);

      //Auth::user()->role == "user" || $user->role == "admin" || $user_current == 16
        if(($id == 16) || ($user_current != 16 && $user->role == "admin"))
        {
             echo "<script type='text/javascript'>
                alert('Xin Lỗi, Bạn Không thể xóa account này');
                window.location = '";
                    echo route('admin.user.list');
                echo "'
            </script>";
           
        }
        else
        {
            $user->delete($id);
            return redirect()->route('admin.user.list');
        }
    }

    public function getEdit($id)
    {
        $data = User::find($id);
         if((Auth::user()->id != 16) && ($id == 16 || $data->role == "admin" && (Auth::user()->id != $id) ))
        {
             echo "<script type='text/javascript'>
                alert('Xin Lỗi, Bạn Không thể sửa user admin khác');
                window.location = '";
                    echo route('admin.user.list');
                echo "'
            </script>";
        }
      else {
            
        return view('backend/user/editUser', ['data' => $data]);
      }
    }

     public function postEdit($id, Request $request)
    {
        $user = User::find($id);
        if($request->input('txtPassWord'))
        {
            $this->validate($request, 
            [
                'txtPassWord' => 'same:RePassWord',
                'txtPassWord' => 'required'
            ],
            [
                'RePassWord.same'      => 'RePassword don\'t match',
                'txtPassWord.required' => 'Please input password' 
            ]);
            $pass = $request->input('txtPassWord');
        }
            $user->password = Hash::make($pass);
            $user->email    = $request->txtEmail;
            $user->role     = $request->role;
            $user->remember_token   = $request->input('_token');
            $user->save();

            return redirect()->route('admin.user.list');
        
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('/');
        }
}

}
