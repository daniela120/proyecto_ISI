<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name'  =>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[A-Z][a-z,á,é,í,ó,ú,ñ]+)(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'email' =>['required', 'string','unique:users', 'email', 'regex:/[\w._%+-]{3,}+@[\w.-]+\.[a-zA-Z]{2,4}/' ],
            'password' =>['required', 'string','min:8', 'confirmed','regex:/^[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //$user->roles()->attach(Role::where('name', 'user')->first());
        $user->assignRole('User');
        return $user;
    }    

    /* public function redirectPath(){

        if (auth()->user()->email == 'miguel@gg.com'){

        return '/home';
        }
        return '/BebidasCalientes';
    } */
}
