<?php

namespace App\Http\Controllers\Auth;

use App\Data\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// Dev
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * 登录重定向目录
     */
    protected $redirectPath ;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        // 登陆重定向目录
        $this->redirectPath = URL::action('User\Dashboard\DashboardController@getIndex');
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //判断邮箱验证码
        if($request->input('email_token') != $site = session('email_token')){
            $errors = collect(['邮箱验证码输入不正确']);
            return back()->withInput()->with('errors', $errors);
        }


        Auth::login($this->create($request->all()));

        return redirect($this->redirectPath());
    }

    public function getToken(Request $request)
    {
        //TODO 参数检查

        $email = $request->input('email');

        $emailToken =  str_random(6);
        session(['email_token'=> $emailToken]);

        //TODO 过期时间
//        session(['email_created_at'=> $emailToken]);
        Mail::raw("邮箱验证码： {$emailToken}", function ($message) use ($email) {
            $to = $email;
            $message ->to($to)->subject('欢迎使用 Scholar');
        });
        return ['status', 'success'];
    }

}
