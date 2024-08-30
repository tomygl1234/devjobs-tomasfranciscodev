<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('¿What kind of account do would you like to create?')" />
            <select 
            name="role" 
            id="role"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 w-full text-center"
            >
            <option value="" selected>Select your role</option>
            <option value="1">Developer - Serch for a new job</option>
            <option value="2">Recruiter - Offer jobs</option>

            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-3 items-center">
            <x-link :href="route('login')">
                Login
            </x-link>
            <x-link :href="route('password.request')">
                Forgot your password?
            </x-link>
            

                


            
        </div>
        <x-primary-button class="w-full justify-center">
            {{ __('Create account') }}
        </x-primary-button>
    </form>
</x-guest-layout>
