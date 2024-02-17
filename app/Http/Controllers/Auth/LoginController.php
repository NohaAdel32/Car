<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'userName' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['userName' => $request->userName, 'password' => $request->password,])) {
            
            // Authentication was successful
            return redirect()->intended($this->redirectTo);
           
        } else {
            // Authentication failed
            return back()->withErrors(['userName' => 'Invalid username or password'])->withInput($request->only('userName'));
        }
    }

    
}
