<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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

        $user = Socialite::driver('google')->user();
        // dd($user);

        $user = User::firstOrCreate([ // 이미 있으면 걸러줌.
            'email' => $user->getEmail()], // 검색조건
            ['password' => Hash::make(Str::random(24)),
            'name' => $user->getName()]
        );
        Auth::login($user);
        
        return redirect()->intended('/dashboard');
    }
}