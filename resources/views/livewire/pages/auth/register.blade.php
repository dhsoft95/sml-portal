<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.main')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="auth-page" style="background-color: #333; color: white; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4" style="background-color: #444; border-radius: 8px;">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="/" class="d-block auth-logo">
                                        <img src="assets/images/logo-sm.png" alt="" height="58">
                                        <span class="logo-txt" style="color: gold;">Simba Money</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0" style="color: white;">Register Account</h5>
                                        <p class="text-muted mt-2" style="color: gold !important;">Get your free Simba Money account now.</p>
                                    </div>
                                    <form class="mt-4 pt-2" wire:submit.prevent="register">
                                        <!-- Name -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label" style="color: white;">Name</label>
                                            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Enter name" required autofocus autocomplete="name" style="background-color: #555; border: 1px solid gold; color: white;">
                                            <div class="invalid-feedback" style="color: red;">Please Enter Name</div>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red; list-style: none; font-size: xx-small" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label" style="color: white;">Email</label>
                                            <input type="email" class="form-control" id="email" wire:model="email" placeholder="Enter email" required autocomplete="username" style="background-color: #555; border: 1px solid gold; color: white;">
                                            <div class="invalid-feedback" style="color: red;">Please Enter Email</div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red; list-style: none; font-size: xx-small" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label" style="color: white;">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="password" wire:model="password" placeholder="Enter password" required autocomplete="new-password" style="background-color: #555; border: 1px solid gold; color: white;">
                                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon" onclick="togglePassword()" style="background-color: #555; border: 1px solid gold; color: white;">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                            <div class="invalid-feedback" style="color: red;">Please Enter Password</div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red; list-style: none; font-size: xx-small" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label" style="color: white;">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation" placeholder="Enter password again" required autocomplete="new-password" style="background-color: #555; border: 1px solid gold; color: white;">
                                            <div class="invalid-feedback" style="color: red;">Please Confirm Password</div>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red; list-style: none; font-size: xx-small" />
                                        </div>

                                        <div class="mb-4">
                                            <p class="mb-0">By registering you agree to the Simba Money <a href="#" class="text-primary" style="color: gold;">Terms of Use</a></p>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" style="background-color: gold; border:none; color: black;"
                                                    onmouseover="this.style.backgroundColor='white'; this.style.color='black'" onmouseout="this.style.backgroundColor='gold'; this.style.color='black'">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0" style="color: white !important;">Already have an account? <a href="/login" class="text-primary fw-semibold" style="color: gold !important;">Login</a></p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Simba Money</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay bg-dark"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end auth page -->
    </div>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordAddon = document.getElementById('password-addon').querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordAddon.classList.remove('mdi-eye-outline');
            passwordAddon.classList.add('mdi-eye-off-outline');
        } else {
            passwordField.type = 'password';
            passwordAddon.classList.remove('mdi-eye-off-outline');
            passwordAddon.classList.add('mdi-eye-outline');
        }
    }
</script>




