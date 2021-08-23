<?php

namespace App\Http\Controllers;

use Algolia\AlgoliaSearch\Http\Psr7\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class KakaoAuthController extends Controller
{
    // protected $fillable = ['name', 'email', 'password', 'updated_at', 'created_at'];

    public function __construct() {
        $this->middleware(['guest']);
    }

    public function redirect() {
        return Socialite::driver('kakao')->redirect();
    }

    public function callback() {
        $user = Socialite::driver('kakao')->user();

        // dd($user);

        $user = User::firstOrCreate(['email' => $user->getEmail()],
            ['password' => Hash::make(Str::random(24)),
            'name' => $user->getName()]
        );
   
        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}
