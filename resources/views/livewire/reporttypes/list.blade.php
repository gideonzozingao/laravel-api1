<?php
use App\Models\User;
use App\Models\ReportType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $report_types;
    public function mount(): void
    {
        $this->report_types = ReportType::get();
    }
}; ?>

<div class="mt-1 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($report_types as $report_type)
        <div class="p-6 flex space-x-2" wire:key="{{ $report_type->id }}">

            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <!-- Add anchor tag here -->
                        <p
                            class="text-gray-800 hover:underline">{{ $report_type->report_type }}
                        <small class="ml-2 text-sm text-gray-600">{{ $report_type->created_at->format('j M Y, g:i a') }}</small> </p>
                        <p class="ml-2 text-sm text-gray-600">{{ $report_type->description }}</p>
                    </div>
                </div>
                
            </div>
        </div>
    @endforeach
</div>
