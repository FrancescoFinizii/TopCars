@if ($paginator->hasPages())
    <ul class="pager flex-centered">
        @if ($paginator->onFirstPage())
            <li class="btn-rect btn-cyan-disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="prev btn-rect btn-cyan">← Previous</a></li>
        @endif
        @foreach ($elements as $element)
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="btn-rect my-active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}" class="btn-rect btn-cyan">{{ $page }}</a></li>
                @endif
            @endforeach
        @endforeach
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="btn-rect btn-cyan" rel="next">Next →</a></li>
        @else
            <li class="btn-rect btn-cyan-disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif
