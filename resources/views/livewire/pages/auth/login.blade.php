<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.main')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: true), navigate: true);
    }
}; ?>
<div>
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
                                            <h5 class="mb-0" style="color: white;">Welcome Back!</h5>
                                            <p class="text-muted mt-2" style="color: gold !important;">Sign in to continue to Simba Money.</p>
                                        </div>
                                        <div>
                                            <!-- Session Status -->
                                            <x-auth-session-status class="mb-4" :status="session('status')" />

                                            <form class="mt-4 pt-2" wire:submit.prevent="login">
                                                @csrf
                                                <!-- Username -->
                                                <div class="mb-3">
                                                    <x-input-label class="form-label" for="email" :value="__('Email')" />
                                                    <x-text-input wire:model="form.email" id="email" class="form-control block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" style="background-color: #555; border: 1px solid gold; color: white;" />
                                                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" style="color: red; list-style: none; font-size: xx-small" />
                                                </div>
                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <x-input-label class="form-label" for="password" :value="__('Password')" />
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="">
                                                                <a href="{{ route('password.request') }}" class="text-muted" style="color: gold!important;">Forgot password?</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-group auth-pass-inputgroup">
                                                        <x-text-input wire:model="form.password" id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="background-color: #555; border: 1px solid gold; color: white;" />
                                                        <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon" onclick="togglePassword()" style="background-color: #555; border: 1px solid gold; color: white;"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                                                </div>

                                                <!-- Remember Me -->
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input wire:model="form.remember" class="form-check-input" type="checkbox" id="remember-check" style="background-color: #555; border: 1px solid gold; color: white;">
                                                            <label class="form-check-label" for="remember-check" style="color: gold;">Remember me</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mb-3">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" style="background-color: gold; border: none; color: black;"
                                                            onmouseover="this.style.backgroundColor='white'; this.style.color='black'" onmouseout="this.style.backgroundColor='gold'; this.style.color='black'">
                                                        {{ __('Log in') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0" style="color: white !important;">Don't have an account? <a href="/register" class="text-primary fw-semibold" style="color: gold !important;">Signup now</a></p>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Simba Money Ltd</p>
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
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container fluid -->
            </div>
            <!-- end auth full page content -->
        </div>
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

