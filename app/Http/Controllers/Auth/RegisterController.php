<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\aak;
use App\mhs;
use App\dosen;
use App\keuangan;
use App\perpustakaan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:aak');
        $this->middleware('guest:mhs');
        $this->middleware('guest:dosen');
        $this->middleware('guest:keuangan');
        $this->middleware('guest:perpustakaan');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

/**
 * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showaakRegisterForm()
    {
        return view('auth.register', ['url' => 'aak']);
    }
    public function showdosenRegisterForm()
    {
        return view('auth.register', ['url' => 'dosen']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showmhsRegisterForm()
    {
        return view('auth.register', ['url' => 'mhs']);
    }
    public function showkeuanganRegisterForm()
    {
        return view('auth.register', ['url' => 'keuangan']);
    }
    public function showperpustakaanRegisterForm()
    {
        return view('auth.register', ['url' => 'perpustakaan']);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'nik'=> $data['nik'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /**
     * @param Request $request
     *@return \App\mhs
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createmhs(Request $request)
    {
       
       return mhs::create([
            'nim' => $request->nim,
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'email' => $request->email,
            'semester' => $request->semester,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login');
    }
    /**
     * @param Request $request
     *@return \App\aak
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    protected function createaak(Request $request)
    {
        $this->validator($request->all())->validate();
        aak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login');
    }
    /**
     * @param Request $request
     *@return \App\dosen
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    protected function createdosen(Request $request)
    {
        $this->validator($request->all())->validate();
        dosen::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login');
    }
     /**
     * @param Request $request
     *@return \App\keuangan
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    protected function createkeuangan(Request $request)
    {
        $this->validator($request->all())->validate();
        keuangan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login');
    }
       /**
     * @param Request $request
     *@return \App\perpustakaan
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    protected function createperpustakaan(Request $request)
    {
        $this->validator($request->all())->validate();
        perpustakaan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login');
    }
}
