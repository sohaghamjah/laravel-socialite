<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Google login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    // Google callback
    public function handleGooleCallback(){
        $user = Socialite::driver('google')->user();
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
}
