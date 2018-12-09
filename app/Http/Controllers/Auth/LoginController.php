<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuthentication;

class LoginController extends Controller
{
    /*njn
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers; // sử dụng cái authentica có sẵn của Laravel

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // định nghĩa lại mấy hàm của nó: ở đâu ta
    // show ra form mặc định của authentication
    public function showLoginForm()
    {
        return view('auth/login');
    }

    // Điều hướng, nếu là admin thì vô admin_dashboard, users thì vô trang route home
    protected function authenticated(Request $request, $user)
    {
        if($user->role == 'admin' || $user->role == 'supper admin'){
            return redirect()->route('admin/product/getList');
        }
        elseif ($user->role == 'user'){
            return redirect()->route('home');
        }
    }
}
