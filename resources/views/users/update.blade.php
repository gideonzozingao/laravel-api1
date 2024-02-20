<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($user)
                {{ __('Update  Information  for ') . $user->name }}
            @endisset
        </h2>

    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
                
                <livewire:users.updateDetails  :user="$user"/>
                
                <livewire:users.update-credentials  :user="$user"/>
                <livewire:users.update-account-status :user="$user" />
        </div>
    </div>
</x-app-layout>
