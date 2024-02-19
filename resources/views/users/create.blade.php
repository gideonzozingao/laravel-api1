
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Registration') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"">
            {{-- <livewire:users.list /> --}}
            <livewire:users.create />
        </div>
    </div>

</x-app-layout>
