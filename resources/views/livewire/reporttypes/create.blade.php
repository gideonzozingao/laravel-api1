<?php
use App\Models\ReportType;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {
    public string $report_type = '';
    public string $description = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'report_type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $reportType = ReportType::create($validated);

        if ($reportType) {
            session()->flash('success', 'Report type created successfully.');
        }
    }
}; ?>


    
        <div class="mt-1 bg-white shadow-sm rounded-lg divide-y p-8">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form wire:submit="register">
                <!-- Report Type -->
                <div>
                    <x-input-label for="report_type" :value="__('Report Type')" />
                    <x-text-input wire:model="report_type" id="report_type" class="block mt-1 w-full" type="text"
                        name="report_type" required autocomplete="report_type" />
                    <x-input-error :messages="$errors->get('report_type')" class="mt-2" />
                </div>
                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea wire:model="description" id="description"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        name="description" required></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- Register Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-danger-button class="ml-4">
                        {{ __('Register') }}
                    </x-danger-button>
                </div>
            </form>
        </div>


