@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2> <span class="arrow-step"></span>
                <h3 class="rs"><a href="{{url('video')}}" title="Video">Video</a></h3>
            </div>
            <div class="video-content">
                @if ($mainVideo)
                <div class="video" id="bigVideo">
                    <iframe src="{{$mainVideo->url}}" frameborder="0" allowfullscreen width="720" height="425"></iframe>
                </div>
                @endif
                <div class="thumb-video">
                    @foreach ($videos as $video)
                    <a href="{{url('video', $video->slug)}}" title="Trailer">
                        <img src="{{url('files', $video->image)}}" alt="" width="190" height="129" class="imgFull">
                        <span class="title">{{$video->title}}</span>
                        <span class="view-count">
                           Lượt xem {{$video->views}}
                        </span>
                    </a>
                    @endforeach
                </div>
                @include('frontend.pagination', ['paginate' => $videos])
            </div>
        </div>
        @include('frontend.right')
    </div>
@endsection