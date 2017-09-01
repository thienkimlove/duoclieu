<div class="right-content">
    @if (isset($mostReadInCategory) && ($mostReadInCategory->count() > 0) && ($page != 'phan-phoi'))
        <div class="most-readed">
            <h2 class="rs">BÀI ĐỌC NHIỀU NHẤT</h2>
            <div class="content">
                @foreach ($mostReadInCategory as $mostRead)
                    <div class="most-post">
                        <a href="{{url($mostRead->slug.'.html')}}" title="{{$mostRead->title}}" class="img-title">
                            <img src="{{url('files', $mostRead->image)}}" alt="" width="119" height="99">
                        </a>
                        <a href="{{url($mostRead->slug.'.html')}}" class="title" title="{{$mostRead->title}}">
                            {{$mostRead->title}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @if (($mostReads->count() > 0) && ($page != 'phan-phoi'))
            <div class="most-readed">
                <h2 class="rs">BÀI ĐỌC NHIỀU NHẤT</h2>
                <div class="content">
                    @foreach ($mostReads as $mostRead)
                        <div class="most-post">
                            <a href="{{url($mostRead->slug.'.html')}}" title="{{$mostRead->title}}" class="img-title">
                                <img src="{{url('files', $mostRead->image)}}" alt="" width="119" height="99">
                            </a>
                            <a href="{{url($mostRead->slug.'.html')}}" class="title" title="{{$mostRead->title}}">
                                {{$mostRead->title}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif

    @include('frontend.right_search')
    @foreach ($siteBanners as $banner)
    <div class="banner-duocpham">
        @if ($banner->position_id == 5)
            <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="Banner dược phẩm" width="353" height="255"></a>
        @endif
    </div>
    @endforeach

    @if (isset($latestNewInCategory) && ($latestNewInCategory->count() > 0) && ($page != 'phan-phoi'))
            <div class="most-readed">
                <h2 class="rs">TIN MỚI NHẤT</h2>
                <div class="content">
                    @foreach ($latestNewInCategory as $mostRead)
                        <div class="most-post">
                            <a href="{{url($mostRead->slug.'.html')}}" title="{{$mostRead->title}}" class="img-title">
                                <img src="{{url('files', $mostRead->image)}}" alt="" width="119" height="99">
                            </a>
                            <a href="{{url($mostRead->slug.'.html')}}" class="title" title="{{$mostRead->title}}">
                                {{$mostRead->title}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    @else
        @if (($latestNews->count() > 0) && ($page != 'phan-phoi'))
            <div class="most-readed">
                <h2 class="rs">TIN MỚI NHẤT</h2>
                <div class="content">
                    @foreach ($latestNews as $mostRead)
                        <div class="most-post">
                            <a href="{{url($mostRead->slug.'.html')}}" title="{{$mostRead->title}}" class="img-title">
                                <img src="{{url('files', $mostRead->image)}}" alt="" width="119" height="99">
                            </a>
                            <a href="{{url($mostRead->slug.'.html')}}" class="title" title="{{$mostRead->title}}">
                                {{$mostRead->title}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
</div>