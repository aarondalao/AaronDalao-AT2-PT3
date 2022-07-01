<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5
                text-black hover:text-gray-50 focus:outline-none focus:text-gray-50
                focus:border-gray-300 transition duration-150 ease-in-out" href="{{ route('dashboard') }}">
                <div class="">
                    <x-application-logo class="flex-1 h-10 w-auto fill-current text-gray-600"/>
                </div>
                <h1 class=" ml-2 my-2 text-xl"> {{ __('CarBro') }} </h1>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
