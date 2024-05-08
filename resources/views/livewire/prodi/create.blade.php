<?php

use Livewrie\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $kode = '';

    #[Validate('required|string|max:255')]
    public string $nama = '';

    #[Validate('required|string|max:255')]
    public string $jenjang = '';

    public function createProdi(): void
    {
        try {
            Prodi::create([
                'kode' => $this->kode,
                'nama' => $this->nama,
                'jenjang' => $this->jenjang,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->reset();
    }
}; ?>

<div>
    <form wire:submit="createProdi" class="p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Prodi') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="kode" value="{{ __('Kode') }}" class="sr-only" />

            <x-text-input
                wire:model="kode"
                id="kode"
                name="name"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Kode') }}"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('kode')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="nama" value="{{ __('Nama') }}" class="sr-only" />

            <x-text-input
                wire:model="nama"
                id="nama"
                name="nama"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Nama') }}"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="jenjang" value="{{ __('Jenjang') }}" class="sr-only" />

            <x-text-input
                wire:model="jenjang"
                id="jenjang"
                name="jenjang"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Jenjang') }}"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('jenjang')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button type="submit" class="ml-2">
                {{ __('Create') }}
            </x-primary-button>
        </div>                
    </form>
</div>
