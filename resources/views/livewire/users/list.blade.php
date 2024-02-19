<?php
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $users;
    public function mount(): void
    {
        $this->users = User::get();
    }
}; ?>

<div class="mt-1 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($users as $user)
        <div class="p-6 flex space-x-2" wire:key="{{ $user->id }}">

            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <!-- Add anchor tag here -->
                        <a href="{{ route('user', ['id' => $user->id]) }}"
                            class="text-gray-800 hover:underline">{{ $user->name }}</a>
                        <small class="ml-2 text-sm text-gray-600">{{ $user->created_at->format('j M Y, g:i a') }}</small>
                        <small class="ml-2 text-sm text-gray-600">{{ $user->is_admin ? 'Admin User' : '' }}</small>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $user->email }}</p>
            </div>
        </div>
    @endforeach
</div>
