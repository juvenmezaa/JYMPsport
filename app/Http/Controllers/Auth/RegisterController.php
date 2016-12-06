<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Toastr;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birthdate' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'birthdate' => $data['birthdate'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => '0',
        ]);
    }

    public function register(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        Mail::to($user->email)->send(new ConfirmationEmail($user));
        return back()->with('status','Please confirm your email address.');
        /*$this->guard()->login($user);
        return redirect($this->redirectPath());*/
    }

    public function confirmEmail($token)
    {
        $user = User::whereToken($token)->first();

        if ($user) { // user with token was found
            $user->hasVerified();
            $message = 'Ya has confirmado tu correo electrónico. Puedes iniciar sesión';
            Toastr::success($message, $title = null, $options = []);
        } else {
            // no user was found for that token
            $message = "Token de confirmacion no válido";
            Toastr::error($message, $title = null, $options = []);
        }

        return redirect('login');
   }
}
