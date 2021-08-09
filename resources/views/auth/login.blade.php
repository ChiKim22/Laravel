<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justifiy-end mt-4 h-24">
                <button class="bg-green-200 hover:bg-green-500 text-blue-500 font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded">
                    <a href="{{ route('github.login') }}">Signin with Github</a>
                  </button>

                <button class="bg-blue-400 hover:bg-blue-500 text-white font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded">
                    <a href="{{ route('google.login') }}">Signin with Google</a>
                  </button>

                <button class="bg-yellow-300 hover:bg-yellow-500 text-black-200 font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded">
                    <a href="{{ route('kakao.login') }}">Signin with Kakao</a>
                  </button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
