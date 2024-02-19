<?php
use App\Models\ReportType;
use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $reports;
    public int $reportCount;
    public function mount(): void
    {
        $this->reports = Report::with(['user', 'report_type'])->get(); 
        $this->reportCount = $this->reports->count(); // Corrected method call
    }
}; ?>

<div class="mt-1 bg-white shadow-sm rounded-lg divide-y">
    @if ($reportCount>0)
        @foreach ($reports as $report)
            <!-- Corrected variable name -->
            <div class="p-6 flex space-x-2" wire:key="{{ $report->id }}">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <p>{{ $report->user->name }} {{ $report->report_type->report_type }}</p>
                        <!-- Corrected property name -->
                        <p class="text-gray-800 hover:underline">
                            <small
                                class="ml-2 text-sm text-gray-600">{{ $report->created_at->format('j M Y, g:i a') }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="p-6 flex space-x-2">
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <h4>No reports available..</h4>
                </div>
            </div>
        </div>
    @endif
        
</div>
