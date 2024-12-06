{{-- resources/views/vendor/pagination/custom.blade.php --}}
@if ($paginator->hasPages())
<div class="pagination-container">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><span>&laquo; Prev</span></li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Prev</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
        @elseif (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
        @else
        <li class="disabled"><span>Next &raquo;</span></li>
        @endif
    </ul>
</div>
<style>
    .pagination-container {
        text-align: center;
        /* Center the pagination */
        margin: 20px 0;
        /* Add some space above and below */
    }

    .pagination {
        display: inline-flex;
        /* Align items horizontally */
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
        /* Space between pagination items */
    }

    .pagination li a,
    .pagination li span {
        display: inline-block;
        padding: 8px 16px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: #007bff;
        /* Blue color for links */
        border: 2px solid #007bff;
        /* Border for the pagination items */
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination li a:hover,
    .pagination li span:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: #fff;
    }

    .pagination li.disabled span {
        color: #ccc;
        border-color: #ccc;
    }
</style>
@endif