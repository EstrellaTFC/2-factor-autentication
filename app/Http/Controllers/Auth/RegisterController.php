<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Session;
use stdClass;
use Mail;
//use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Account;
use App\mail\MyTestMail;

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
    protected $redirectTo = '/confirm';

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
            'acc' => ['required'],
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
        $acc = $data['acc'];
        //use api
        $data2 = Account::where('acc_no', $acc)->get();
        if ($data2->isEmpty()) {
           Session::flash('error', 'account number does not exist');
            print_r(
                '<script>
                window.location = "http://localhost:8000/register";
                </script>'
            );
        }
        foreach ($data2 as $row) {
           $email = $row->email;
           $chk = $row->chk;
        }
        #::::HERE IS THE SCRIPT TO SEND THE MAIL::::
        $message = "here is the code to use to activte your account: ". $chk;
        $myEmail = 'yd4u2c@yahoo.com';
        Mail::to($email)->send(new MyTestMail($message));

        return User::create([
            'name' => $data['name'],
            'email' => $email,
            'password' => Hash::make($data['password']),
        ]);
    }
}
