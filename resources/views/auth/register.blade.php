<x-guest-layout>
        <div class="bg-white p-4 w-full max-w-md">
            <!-- Header -->
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Register Cafe Sixs</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block w-full mt-1 border-gray-300 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-4">
                    <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                    <x-text-input id="nomor_telepon" class="block w-full mt-1 border-gray-300 rounded-lg" type="text" name="nomor_telepon" :value="old('nomor_telepon')" required />
                    <x-input-error :messages="$errors->get('nomor_telepon')" class="mt-2" />
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" class="block w-full mt-1 border-gray-300 rounded-lg" type="text" name="alamat" :value="old('alamat')" required />
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1 border-gray-300 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block w-full mt-1 border-gray-300 rounded-lg" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block w-full mt-1 border-gray-300 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-3 bg-green-600 hover:bg-green-700">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>
