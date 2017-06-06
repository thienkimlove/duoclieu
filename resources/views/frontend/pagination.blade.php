@if ($paginate->lastPage() > 1)
    <div class="box-page">
        <ul class="pagination">
            @if ($paginate->currentPage() != 1 && $paginate->lastPage() >= 5)
                <li><a href="{{ $paginate->url($paginate->url(1)) }}" >«</a></li>
            @else
                <li class="disabled"><span>«</span></li>
            @endif

            {{--@if($paginate->currentPage() != 1)
                <li><a href="{{ $paginate->url($paginate->currentPage()-1) }}" ><</a></li>
            @endif--}}
            @if($paginate->currentPage()<5)
                @if($paginate->lastPage()<=10)
                    @for($i = 1; $i <= $paginate->lastPage(); $i++)
                        <li class="{{ ($paginate->currentPage() == $i)? ' active' : '' }}"><a href="{{$paginate->url($i) }}">{{$i}}</a></li>
                    @endfor
                @else
                    @for($i = 1; $i <= 5; $i++)
                        <li class="{{ ($paginate->currentPage() == $i)? ' active' : '' }}"><a href="{{$paginate->url($i) }}">{{$i}}</a></li>
                    @endfor
                    <li class="disabled"><span>...</span></li>
                    <li class="pLink"><a href="{{$paginate->url($paginate->lastPage()-1) }}">{{$paginate->lastPage()-1}}</a></li>
                    <li><a href="{{$paginate->url($paginate->lastPage()) }}">{{$paginate->lastPage()}}</a></li>
                @endif
            @elseif($paginate->lastPage() - 5 < $paginate->currentPage())
                @if($paginate->lastPage()<=10)
                    @for($i = 1; $i <= $paginate->lastPage(); $i++)
                        <li class="{{ ($paginate->currentPage() == $i)? ' active' : '' }}"><a href="{{$paginate->url($i) }}">{{$i}}</a></li>
                    @endfor
                @else
                    <li><a href="{{$paginate->url(1) }}">1</a></li>
                    <li><a href="{{$paginate->url(2) }}">2</a></li>
                    <li class="disabled"><span>...</span></li>
                    @for($i = $paginate->lastPage() - 4; $i <= $paginate->lastPage(); $i++)
                        <li class="{{ ($paginate->currentPage() == $i)? ' active' : '' }}"><a href="{{$paginate->url($i) }}">{{$i}}</a></li>
                    @endfor
                @endif
            @elseif($paginate->currentPage()>=5)
                <li><a href="{{$paginate->url(1) }}">1</a></li>
                <li><a href="{{$paginate->url(2) }}">2</a></li>
                <li class="disabled"><span>...</span></li>
                @for($i = $paginate->currentPage()-2; $i <= $paginate->currentPage() + 2; $i++)
                    <li class="{{ ($paginate->currentPage() == $i)? ' active' : '' }}"><a href="{{$paginate->url($i) }}">{{$i}}</a></li>
                @endfor
                <li class="disabled"><span>...</span></li>
                <li><a href="{{$paginate->url($paginate->lastPage()-1) }}">{{$paginate->lastPage()-1}}</a></li>
                <li><a href="{{$paginate->url($paginate->lastPage()) }}">{{$paginate->lastPage()}}</a></li>
            @endif

            {{--@for($i = max($paginate->currentPage()-2, 1); $i <= min(max($paginate->currentPage()-2, 1)+4,$paginate->lastPage()); $i++)
                <li class="{{ ($paginate->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{$paginate->url($i) }}">{{$i}}</a>
                </li>
            @endfor--}}

            @if ($paginate->currentPage() != $paginate->lastPage() && $paginate->lastPage() >= 5)
                <li><a href="{{$paginate->url($paginate->lastPage())}}" >»</a></li>
            @else
                <li class="disabled pEnd"><span>»</span></li>
            @endif
        </ul>
    </div>
@endif