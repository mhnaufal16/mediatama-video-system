<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-gray-900">Forgot Password?</h2>
        <p class="text-sm text-gray-500 mt-1">No problem. Just let us know your email address.</p>
    </div>

    <div class="mb-6 text-sm text-gray-600 bg-blue-50 p-4 rounded-xl border border-blue-100">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your registered email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-3 text-base rounded-xl bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 transition-all shadow-lg shadow-blue-600/30">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
