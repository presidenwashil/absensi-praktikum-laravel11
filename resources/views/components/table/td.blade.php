@props([
    'clickable' => false,
    'funcName' => 'loadData',
])

@php($rowspan = $attributes->get('rowspan'))

<td {{ $attributes->whereDoesntStartWith('data-')->when($rowspan == '0', fn ($attr) => $attr->except('rowspan')) }} class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm text-gray-900">
        {{ $slot }}
    </div>
    @if ($clickable)
        <button {{ $attributes->whereStartsWith('data-')->merge([
            'class' => 'absolute inset-0 bg-transparent border-0',
            'type' => 'button',
        ]) }} onclick="{{ $funcName }}(this); document.documentElement.scrollTop = 0;"></button>
    @endif
</td>