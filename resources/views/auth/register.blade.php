<x-guest-layout>
    <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0A041C 60%,#7000FF 100%);">
        <div style="background:rgba(20,10,40,0.95);padding:2.5rem 2rem 2rem 2rem;border-radius:20px;box-shadow:0 8px 40px rgba(112,0,255,0.25);width:100%;max-width:400px;">
            <div style="text-align:center;margin-bottom:2rem;">
                <span style="font-size:2.2rem;font-weight:800;background:linear-gradient(135deg,#7000FF,#FF00E5);-webkit-background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:1px;">nexioarena</span>
                <div style="color:#00FF94;font-size:1.1rem;font-weight:600;margin-top:0.5rem;">Create Your Account</div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="name" :value="__('Name')" style="color:#F5F3FF;" />
                    <x-text-input id="name" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="email" :value="__('Email')" style="color:#F5F3FF;" />
                    <x-text-input id="email" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="password" :value="__('Password')" style="color:#F5F3FF;" />

                    <x-text-input id="password" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="password" name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom:1.2rem;">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="color:#F5F3FF;" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" style="background:rgba(255,255,255,0.08);border:2px solid #7000FF;color:#F5F3FF;border-radius:12px;padding:0.8rem 1rem;" type="password" name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" style="width:100%;background:linear-gradient(135deg,#7000FF,#FF00E5);color:#fff;font-weight:700;padding:0.9rem 0;border:none;border-radius:12px;font-size:1.1rem;box-shadow:0 4px 20px rgba(112,0,255,0.15);transition:background 0.3s;">Register</button>
            </form>
            <div style="text-align:center;margin-top:1.5rem;">
                <span style="color:#F5F3FF;">Already have an account?</span>
                <a href="{{ route('login') }}" style="color:#00FF94;font-weight:600;">Log in</a>
            </div>
        </div>
    </div>
</x-guest-layout>
