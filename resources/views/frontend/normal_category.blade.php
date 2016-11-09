@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs"><a href="javascript:void(0)" title="{{$category->title}}">{{$category->title}}</a></h2>
            </div>

            <div class="list-news">
                @if ($hotPost->count() > 0)
                    @foreach ($hotPost as $post)
                       <div class="hot-news">
                    <div class="post" id="post-hot-news">
                        <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title">
                            <img src="{{url('img/cache/432x311', $post->image)}}" alt="" width="432" height="311">
                        </a>
                        <div class="right">
                            <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                {{$post->title}}
                            </a>
                            <div class="sumary">
                                {{$post->desc}}
                            </div>
                        </div>
                    </div>
                    <div class="border pa"></div>
                </div>
                    @endforeach
                @endif
                <div class="news">
                    @foreach ($posts as $post)
                    <div class="post post-news">
                        <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title">
                            <img src="{{url('img/cache/276x157', $post->image)}}" alt="" width="276" height="157">
                        </a>
                        <div class="right">
                            <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                {{$post->title}}
                            </a>
                            <div class="sumary">
                                {{$post->desc}}
                            </div>
                            <a href="{{url($post->slug.'.html')}}" class="view-detail" title="Xem chi tiết">Xem chi tiết>></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @include('frontend.pagination', ['paginate' => $posts])
            </div>
        </div>
        @include('frontend.right')
    </div>
@endsection