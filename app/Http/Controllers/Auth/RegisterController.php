<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use App\Models\Member\Member;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:3', 'max:25', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['company'] === 'company') {
            $user =  User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'roles' => 'COMPANY'
            ]);
            Company::create([
                'users_id' => $user->id,
                'category_id' => 1, //definisiakn ID category_company, yg defaultny apa
                'company_name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'logo' => 'assets/img/company/thumbnail.jpg',
                'location' => 'Silahkan dilengkapi',
                'contact' => 'Silahkan dilengkapi',
                'description' => 'Silahkan dilengkapi',
                'status' => 'NON-ACTIVATED'
            ]);
        } else {
            $user =  User::create([
                'name' => $data['name'],
                'username' => Str::slug($data['username']),
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'roles' => 'MEMBER'
            ]);
            Member::create([
                'users_id' => $user->id
            ]);
        }

        return $user;
    }

    protected function registered()
    {
        $this->guard()->logout();
        return redirect()->route('login')->with('success', "You're registered, please verify your email address and login.");
    }
}
