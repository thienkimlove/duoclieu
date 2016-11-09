<div class="right-content pr">
   @include('frontend.right_search')
    @foreach ($siteBanners as $banner)
    <div class="banner-duocpham">
        @if ($banner->position_id == 5)
            <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="Banner dược phẩm" width="353" height="255"></a>
        @endif
    </div>
    @endforeach
    @if ($rightVideos->count() > 0)
    <div class="video-group">
        <h2 class="rs">GÓC VIDEO</h2>
        @if ($firstVideo = $rightVideos->shift())
        <div class="content pr">
            <iframe src="{{$firstVideo->url}}" frameborder="0" allowfullscreen width="455" height="222"></iframe>
        </div>
        @endif
        @if ($rightVideos->count() > 0)
        <div class="tabs pr">
            @foreach ($rightVideos as $video)
            <a href="{{url('video', $video->slug)}}" title="Trailer" data-src="{{$video->url}}">
                {{$video->title}}
            </a>
            @endforeach
        </div>
        @endif
    </div>
    @endif
</div>