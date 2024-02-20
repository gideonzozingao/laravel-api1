<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Types') }}
        </h2>
    </x-slot>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex justify-end">
        <x-nav-link :href="route('reportsTypes.new')" :active="request()->routeIs('reportsTypes.new')" wire:navigate>
            <x-danger-button class="ms-3"> <x-heroicons::mini.solid.plus-circle
                class="w-5 h-5" /></x-danger-button>
        </x-nav-link>
    </div>
    <div class="py-2">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8"">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex justify-end">
                {{-- <x-nav-link :href="route('users.new')" :active="request()->routeIs('users.new')" wire:navigate>
                    <x-danger-button class="ms-3">{{ __('New') }}</x-danger-button>
                </x-nav-link> --}}
            </div>

            <livewire:reporttypes.list />
        </div>
    </div>

</x-app-layout>
