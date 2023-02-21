<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Google login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    // Google callback
    public function handleGooleCallback(){
        $user = Socialite::driver('google')->user();

        $this->_userRegisterOrLogin($user);

        return redirect()->route('home');
    }

    // Facebook login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    
    // Facebook callback
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
    }

     // Github login
     public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }
    
    // Github callback
    public function handleGithubCallback(){
        $user = Socialite::driver('github')->user();
    }


    protected function _userRegisterOrLogin($data){
        $user = User::where('email', '=', $data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);

    }
}
