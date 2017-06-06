@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs">{{$category->name}}</h2>
                {!! Form::open(array('url' => url($category->slug), 'id' => 'search-thuoc', 'method' => 'GET')) !!}
                    <input type="text" name="q" placeholder="Từ khóa: tên dược liệu, ten khóa học"/>
                    <button value="Tìm">Tìm</button>
                {!! Form::close() !!}
            </div>
            <div id="searchByabc">
                @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'] as $character)
                   <a href="{{url($category->slug.'?sort='.strtolower($character))}}" title="Tìm theo chữ cái {{$character}}">{{$character}}</a>
                @endforeach
            </div>
            <div class="list-news">
                <div class="news">
                    @foreach ($posts as $post)
                       <div class="post post-news">
                        <div class="post-content">
                            <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title">
                                <img src="{{url('img/cache/224x135', $post->image)}}" alt="" width="224" height="135" class="imgFull">
                            </a>
                            <a href="{{url($post->slug.'.html')}}" class="name" title="Giảo cổ lam"> {{$post->name}}</a>
                            <a href="{{url($post->slug.'.html')}}" class="title" title="Tên khoa học">
                                {{$post->s_name}}
                            </a>
                            <div class="sumary">
                                {{$post->desc}}
                            </div>
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