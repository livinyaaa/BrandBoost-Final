<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#eae5d5]">
       <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <!-- Form for password update -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Hidden input for token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email input -->
                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password input -->
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div>

                <!-- Password confirmation input -->
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>

                <!-- Submit button -->
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>


