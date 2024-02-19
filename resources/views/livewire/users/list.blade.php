<?php
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $users;
    public bool $loading = true; // Add loading state variable
    public function mount(): void
    {
        $this->users = User::get();
        $this->loading = false; // Set loading state to false once data is fetched
    }
}; ?>

<div class="mt-1 bg-white shadow-sm rounded-lg divide-y">
    @if ($loading) <!-- Display loading indicator if data is loading -->
        <div class="text-center py-4">
            <svg class="animate-spin h-5 w-5 text-gray-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647zM20 12c0-3.042-1.135-5.824-3-7.938l-3 2.647A7.962 7.962 0 0120 12z"></path>
            </svg>
        </div>
    @else <!-- Render users' data once loading is complete -->
        @foreach ($users as $user)
            <div class="p-6 flex space-x-2" wire:key="{{ $user->id }}">
                
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <!-- Add anchor tag here -->
                            <a href="{{ route('user', ['id' => $user->id]) }}"
                                class="text-gray-800 hover:underline">{{ $user->name }}</a>
                            <small
                                class="ml-2 text-sm text-gray-600">{{ $user->created_at->format('j M Y, g:i a') }}</small>
                            <small
                                class="ml-2 text-sm text-gray-600">{{ $user->is_admin ? 'Admin User' : '' }}</small>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $user->email }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
