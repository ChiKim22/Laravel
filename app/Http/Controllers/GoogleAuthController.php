<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']); // 사용자가 로그인 중이 아님을 감지.
    }
    
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        
    }
}
