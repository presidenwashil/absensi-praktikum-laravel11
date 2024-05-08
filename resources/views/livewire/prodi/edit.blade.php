<?php
 
use App\Models\Prodi; 
use Livewire\Attributes\Validate; 
use Livewire\Volt\Component;
 
new class extends Component
{
    public Prodi $prodi;
    
    public $showEditModal = false;
 
    #[Validate('required|string|max:255')]
    public string $kode = '';

    #[Validate('required|string|max:255')]
    public string $nama = '';

    #[Validate('required|string|max:255')]
    public string $jenjang = '';
 
    public function mount(): void
    {
        $this->kode = $this->prodi->kode;
        $this->nama = $this->prodi->nama;
        $this->jenjang = $this->prodi->jenjang;
    }
 
    public function update(): void
    {
        $validated = $this->validate();
 
        $this->prodi->update($validated);
 
        $this->dispatch('prodi-updated');
    }
 
    public function cancel(): void
    {
        $this->dispatch('prodi-edit-canceled');
    } 
    
    
    public function openEditModal(int $prodiId): void
    {
        $this->prodi = Prodi::find($prodiId);
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('open-modal', ['name' => 'editModal']);
    }

    public function closeEditModal(): void
    {
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('close-modal', ['name' => 'editModal']);
    }
}; ?>
 
<div>
    <x-modal name="editModal" :show="$showEditModal">
        <form wire:submit="update"> 
            <x-text-input
                wire:model="kode"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            
            <x-input-error :messages="$errors->get('kode')" class="mt-2" />
            
            <x-text-input
                wire:model="nama"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
    
            <x-text-input
                wire:model="jenjang"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
    
            <x-input-error :messages="$errors->get('jenjang')" class="mt-2" />
    
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
            <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
        </form> 
    </x-modal>
</div>