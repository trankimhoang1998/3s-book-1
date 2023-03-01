    <style>
        .product__pagination a.disabled {
            pointer-events: none;
            cursor: default;
        }

        .product__pagination a.active {
            background: #7fad39;
            border-color: #7fad39;
            color: #ffffff;
        }
    </style>

    @if ($paginator->hasPages())
        <div class="product__pagination">
            @if ($paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="@if ($paginator->previousPageUrl() == null) disabled @endif"><i
                        class="fa fa-long-arrow-left"></i></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="@if ($paginator->previousPageUrl() == null) disabled @endif"><i
                        class="fa fa-long-arrow-left"></i></a>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{-- <li class="page-item"><span>{{ $element }}</span></li> --}}
                    <a href="" class="active disabled">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <li class="page-item active"><span class="page-link">{{ $page }}</span></li> --}}
                            <a href="" class="active disabled">{{ $page }}</a>
                        @else
                            {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li> --}}

                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="@if ($paginator->nextPageUrl() == null) disabled @endif"><i
                        class="fa fa-long-arrow-right"></i></a>
            @else
                <a href="{{ $paginator->nextPageUrl() }}" class="@if ($paginator->nextPageUrl() == null) disabled @endif"><i
                        class="fa fa-long-arrow-right"></i></a>
            @endif
        </div>
    @endif
