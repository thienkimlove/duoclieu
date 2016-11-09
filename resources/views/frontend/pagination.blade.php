@if ($paginate->lastPage() > 1)
<div class="page">
    <ul class="rs">
        <li><i>Trang {{$paginate->currentPage()}}/{{$paginate->lastPage()}}</i></li>
        @for ($i = 1; $i <= $paginate->lastPage(); $i++)
            <li>
                <a class="{{ ($paginate->currentPage() == $i) ? 'active' : '' }}" href="{{ $paginate->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li>
            <a class="{{ ($paginate->currentPage() == $paginate->lastPage()) ? 'disabled' : '' }}" href="{{ $paginate->url($paginate->currentPage()+1) }}">Sau</a>
        </li>
    </ul>
</div>
@endif