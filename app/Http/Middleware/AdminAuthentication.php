<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     

     // middleware auth cua laravel nó chi dừng lai oơ viec kiem tra xem nguoi dos cos login hay chua
     // chus ko kiem tra dc ndguoi do co phai la admin hay ko
     // => minh phai taoj 1 midleware moi kiem tra role cuar nguoi dang dang nhap ?? right
    public function handle($request, Closure $next)
    {
        $user = Auth::user();//nguoi dang dang nhap
        if($user->role == 'admin' || $user->role == 'supper admin')
            return view('backend.index');
        else{
            return view('web.index');
        }

        if($this->auth->guest())
        {
            if($request->ajax())
            {
                return response('Unauthorized', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);     
    }
}
