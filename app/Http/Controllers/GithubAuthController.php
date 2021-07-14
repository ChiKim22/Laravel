<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GithubAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']); // 사용자가 로그인 중이 아님을 감지.
    }

    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback() {
        $user = Socialite::driver('github')->user();
        // dd($user);
        
        //DB 에 사용자 정보를 저장한다.
        //이미 사용자 정보가 저장되어 있다면
        //저장할 필요가 없다.

        $user = User::firstOrCreate([ // 이미 있으면 걸러줌.
            'email' => $user->getEmail()], // 검색조건
            ['password' => Hash::make(Str::random(24)),
            'name' => $user->getName()]
        );
        // 로그인 처리
        Auth::login($user);

        //사용자가 원래 요청했던 페이지로 리다이렉션
        // 없으면 /dashboard로 리다이렉션
        return redirect()->intended('/dashboard');  // 원래 가려고 하던 곳이 있으면 그곳으로 요청. 없으면 디폴드값.

    }
}
