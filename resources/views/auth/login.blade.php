<x-guest-layout>
    <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0A041C 60%,#7000FF 100%);">
        <div style="background:rgba(20,10,40,0.95);padding:2.5rem 2rem 2rem 2rem;border-radius:20px;box-shadow:0 8px 40px rgba(112,0,255,0.25);width:100%;max-width:400px;">
            <div style="text-align:center;margin-bottom:2rem;">
                <span style="font-size:2.2rem;font-weight:800;background:linear-gradient(135deg,#7000FF,#FF00E5);-webkit-background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:1px;">nexioarena</span>
                <div style="color:#00FF94;font-size:1.1rem;font-weight:600;margin-top:0.5rem;">Sign In to Your Account</div>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="email" :value="__('Email')" style="color:#F5F3FF;" />
                    <x-text-input id="email" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="password" :value="__('Password')" style="color:#F5F3FF;" />

                    <x-text-input id="password" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="password" name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4" style="margin-bottom:1.2rem;">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm" style="color:#F5F3FF;">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between" style="margin-bottom:1.2rem;">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm" style="color:#00FF94;" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" style="width:100%;background:linear-gradient(135deg,#7000FF,#FF00E5);color:#fff;font-weight:700;padding:0.9rem 0;border:none;border-radius:12px;font-size:1.1rem;box-shadow:0 4px 20px rgba(112,0,255,0.15);transition:background 0.3s;">Log in</button>
            </form>

            <div style="text-align:center;margin-top:1.5rem;">
                <span style="color:#F5F3FF;">Don't have an account?</span>
                <a href="{{ route('register') }}" style="color:#00FF94;font-weight:600;">Register</a>
            </div>
        </div>
    </div>
</x-guest-layout>
