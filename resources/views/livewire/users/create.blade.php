<?php
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $username = '';
    public string $phone = '';
    public string $email = '';
    public string $password = '';
    public bool $is_admin = false;
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['integer', 'unique:' . User::class],
            'username' => ['required', 'string', 'unique:' . User::class],
            'password' => ['required', 'string', Rules\Password::defaults()],
            'is_admin' => ['required', 'boolean'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        if ($user) {
            session()->flash('success', 'User Created Successfully.');
        }
    }
}; ?>

<div class="mt-1 bg-white shadow-sm rounded-lg divide-y p-8">
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit="register" class="grid grid-cols-1 gap-y-2 sm:grid-cols-2 gap-x-4">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input wire:model="username" id="username" class="block mt-1 w-full" type="text" name="username"
                required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Role -->
        <div>
            <x-input-label for="is_admin" :value="__('Role')" />
            <select wire:model="is_admin" id="role" name="is_admin" class="block mt-1 w-full">
                <option value="{{ 0 }}">Normal User</option>
                <option value="{{ 1 }}">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="flex items-center justify-end col-span-2 mt-4">
            <x-danger-button class="ms-4">
                {{ __('Register') }}
            </x-danger-button>
        </div>
    </form>
</div>
