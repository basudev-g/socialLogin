<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialLoginRedirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function socialLoginCallback($service)
    {
        $socialiteUser = Socialite::driver($service)->user();
        $findUser = User::where('email', $socialiteUser->getEmail())->first();

        if ($findUser) {
            Auth::login($findUser);
        }else{
            $user = new User();
            $user->name = $socialiteUser->name;
            $user->email = $socialiteUser->getEmail();
            $user->password = bcrypt('password');

            $user->save();
            Auth::login($user);
        }

        return redirect()->route('home');   
    }
}
