@props([
    'columns'     => null,
    'body'        => null,
    'footer'      => null,
    'sortable'    => false,
    'sortColumns' => [],
    'zebra'       => false,
    'hover'       => false,
    'sticky'      => false,
    'borderless'  => false,
    'nowrap'      => false,
])

<div class="overflow-x-auto">
    <div class="min-w-screen bg-gray-100 dark:bg-gray-800 flex items-center justify-center font-sans overflow-hidden">
        <div class="w-full">
            <div class="bg-white dark:bg-gray-900 shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto {{ $nowrap ? 'whitespace-nowrap' : '' }} {{ $hover ? 'hover:bg-gray-100 dark:hover:bg-gray-700' : '' }} {{ $zebra ? 'odd:bg-gray-100 dark:odd:bg-gray-700' : '' }} {{ $sticky ? 'sticky' : '' }} {{ $borderless ? 'border-0' : '' }}">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                            {{ $columns }}
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 dark:text-gray-300 text-sm font-light">
                        {{ $body }}
                    </tbody>
                    @if ($footer)
                        <tfoot>
                            {{ $footer }}
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>