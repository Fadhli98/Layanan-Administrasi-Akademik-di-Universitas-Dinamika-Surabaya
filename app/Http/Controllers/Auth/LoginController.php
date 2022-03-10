<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
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

    use AuthenticatesUsers{
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
       $this->middleware('guest:aak')->except('logout');
       $this->middleware('guest:mhs')->except('logout');
       $this->middleware('guest:dosen')->except('logout');
       $this->middleware('guest:keuangan')->except('logout');
       $this->middleware('guest:perpustakaan')->except('logout');
       
    }
   
   public function login(Request $request)
    {   
        $input = $request->all();
        $messages = [
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
        ], $messages);
  
       $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }
       
        if (Auth::guard('aak')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $details = Auth::guard('aak')->user();
            $aak = $details['original'];
            return redirect()->intended("/aak");
        } else if (Auth::guard('mhs')->attempt(['email' => $request->email, 'password' => $request->password])) {
           
            $details = Auth::guard('mhs')->user();
            $aak = $details['original'];
            return redirect()->intended("/mhs");
        } else if (Auth::guard('dosen')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $details = Auth::guard('dosen')->user();
            $aak = $details['original'];
            
            return redirect()->intended("/doshome");  
        } else if (Auth::guard('keuangan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $details = Auth::guard('keuangan')->user();
            $aak = $details['original'];
            
            return redirect()->intended("/keuanganhome");  
        } else if (Auth::guard('perpustakaan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $details = Auth::guard('perpustakaan')->user();
            $aak = $details['original'];
            
            return redirect()->intended("/perpushome");  
        }

        else {
            return redirect()->back()->withErrors(['E-mail atau password salah', 'The Message']);
            
        }
}


public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect()->route('login');
}
}
    