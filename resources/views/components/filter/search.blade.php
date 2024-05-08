@props([
    'method' => 'searchData',
    'model' => 'search',
    'title' => 'Search',
])

<div {{ $attributes->merge([
    'class' => 'relative overflow-x-auto shadow-md sm:rounded-lg',
]) }}>
    <input type="search" wire:model.debounce.500ms="{{ $model }}" wire:keydown.enter="{{ $method }}" placeholder="{{ $title }}" class="w-2/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300" />
</div>