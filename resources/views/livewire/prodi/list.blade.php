<?php

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $prodis;

    public ?Prodi $editing = null;

    public function mount() : void
    {
        $this->getProdis();
    }

    #[On('prodi-created')]
    public function getProdis() : void
    {
        $this->prodis = Prodi::all();
    }

    public function edit(Prodi $prodi): void
    {
        $this->editing = $prodi;

        $this->getProdis();
    }

    #[On('prodi-edit-canceled')]
    #[On('prodi-updated')] 
    public function disableEditing(): void
    {
        $this->editing = null;
 
        $this->getProdis();
    } 

    public function delete(Prodi $prodi): void
    { 
        $prodi->delete();
 
        $this->getProdis();
    }
}; ?>

<div>
    <x-filter.search />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Kode') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Nama') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Jenjang') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($prodis as $prodi)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-{{ $prodi->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-{{ $prodi->id }}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $prodi->kode }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $prodi->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $prodi->jenjang }}
                        </td>
                        <td class="px-6 py-4">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link wire:click="openEditModal({{ $prodi->id }})">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click="delete({{ $prodi->id }})" wire:confirm="Are you sure to delete this prodi?"> 
                                        {{ __('Delete') }}
                                    </x-dropdown-link> 
                                </x-slot>
                            </x-dropdown>
                        </td>
                        @if ($prodi->is($editing)) 
                            <livewire:prodi.edit :prodi="$prodi" :key="$prodi->id" />
                        @else
                            <p class="mt-4 text-lg text-gray-900">{{ $prodi->message }}</p>
                        @endif 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
