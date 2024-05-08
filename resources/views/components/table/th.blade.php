@props([
    'sortable' => false,
    'sortColumns' => [],
    'name' => null,
    'title' => null,
    'align' => 'left',
])

@if ($sortable && !empty($name))
    @php
        $direction = (string) optional($sortColumns)[$name];

        $alignButtonClass = [
            'flex-row text-left' => $align === 'left',
            'text-right flex-row-reverse' => $align === 'right',
        ];

        $alignTitleClass = [
            'ml-1' => $align === 'right',
            'mr-1' => $align === 'left',
        ];
    @endphp
    <th {{ $attributes->class(['py-2']) }}>
        <button
            type="button"
            class="font-bold w-full p-0 m-0 {{ implode(' ', $alignButtonClass) }}"
            wire:click="sortBy(@js($name), @js($direction))"
        >
            <span class="text-gray-900 {{ implode(' ', $alignTitleClass) }}">{{ $title }}</span>
            @switch($direction)
                @case('asc')
                    <i class="fas fa-arrow-up" style="margin-top: 0.0625rem"></i>
                @break

                @case('desc')
                    <i class="fas fa-arrow-down" style="margin-top: 0.0625rem"></i>
                @break
            @endswitch
        </button>
    </th>
@else
    <th {{ $attributes->class(['py-2', 'text-right' => $align === 'right']) }}>
        {{ $title ?? $slot }}
    </th>
@endif