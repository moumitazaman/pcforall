<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    /*protected function authenticated(Request $request, $user)
    {
        if ($user) {
            $this->redirectTo = route('/home');
        } elseif ($user->is_author()) {
            // $this->redirectTo = route('author.dashboard');
        } else {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();

            return redirect('login');
        }
    }*/

    public function showLoginForm()
    {
        return view('auth.login');
    }


    
}
