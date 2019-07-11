@if ($paginator->hasPages())
    <div class="row pagination-wrap" role="navigation">
        <div class="col-md-6 text-center text-md-left">
            <div class="custom-pagination ml-auto">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a class="prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="" aria-hidden="true">Previous</span>
                    </a>
                @else
                    <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')">Previous</a>
                @endif

                <div class="d-inline-block">
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <a class="" aria-disabled="true"><span
                                        class="">{{ $element }}</span>
                            </a>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <a class="active" aria-current="page"> {{ $page }} </a>
                                @else
                                    <a class="" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')">Next</a>
                @else
                    <a class="next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="" aria-hidden="true">Next</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
