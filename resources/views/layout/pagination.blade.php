@if($paginator->hasPages())
    <ul class="pager flex justify-start gap-2 font-medium">
        @if ($paginator->onFirstPage())
            <li class="disabled text-Neutral-30"><span class="px-3 py-2 border border-Neutral-20 rounded-lg">< Back</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 border border-Neutral-20 rounded-lg">< Back</a></li>
        @endif
        
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled text-Neutral-30"><span class="px-3 py-2 border border-Neutral-20 rounded-lg">{{ $element }}</span></li>
            @endif
            
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="px-3 py-2 border border-Neutral-20 rounded-lg bg-Primary-30 text-Neutral-10">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="px-3 py-2 border border-Neutral-20 rounded-lg">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 border border-Neutral-20 rounded-lg">Next ></a></li>
        @else
            <li class="disabled text-Neutral-30"><span class="px-3 py-2 border border-Neutral-20 rounded-lg">Next ></span></li>
        @endif
    </ul>
@endif
