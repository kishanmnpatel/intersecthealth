{{-- <th class="border-bottom">
    {{ $slot }}
    <span>
        <i class="fas fa-sort"></i>    
    </span>
</th> --}}
@props([
    'sortable' => null,
    'direction' => null,
])

<th class="border-bottom">
    @unless ($sortable)
    <a class="text-default me-3">{{ $slot }}</a>
    @else
        <a {{ $attributes->except('class') }} class="text-default me-3">
            <span>{{ $slot }}</span>

            <span>
                @if ($direction === 'asc')
                    <i class="fas fa-sort-up"></i>
                @elseif ($direction === 'desc')
                    <i class="fas fa-sort-down"></i>                
                @else
                    <i class="fas fa-sort"></i>                
                @endif
            </span>
        </a>
    @endif
</th>
