@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            @if (!isset($is_benh) || !$is_benh)
            <div class="steps">
                @if ($post->category->parent_id)
                <h2 class="rs">
                    <a href="{{url($post->category->parent->slug)}}" title="{{$post->category->parent->title}}">{{$post->category->parent->title}}</a>
                </h2> <span class="arrow-step"></span>
                @endif
                <h3 class="rs"><a href="{{url($post->category->slug)}}" title="{{$post->category->title}}">{{$post->category->title}}</a></h3>
            </div>
            <div class="detail-news">
                <div class="title"><h3 class="rs">{{$post->title}}</h3></div>
                <div class="date">Ngày {{$post->updated_at->format('D/m/Y')}}</div>
                <div class="content">
                    <article>
                        {!! $post->content !!}
                    </article>
                    <div class="content-bottom">
                        <div class='fb-like' data-action='like' data-href='{{url($post->slug.'.html')}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>

                    </div>
                    <div class="data-tags">
                        <span>Từ khóa: </span>
                        @foreach ($post->tags as $tag)
                            <a href="{{url('tag/'.$tag->slug)}}" title="">{{$tag->title}}</a>
                        @endforeach
                    </div>
                    <div class="contact-bottom">
                        <a href="tel:19008198" title="Gọi cho chúng tôi" class="callme">
                            <img src="{{url('frontend/images/hotline.png')}}" alt="" width="215" height="84" class="imgFull">
                        </a>
                        <form action="" class="getPhoneNum">
                            <strong>Ngại gọi điện? Vui lòng nhập số điện thoại</strong>
                            <div class="content">
                                <input type="tel" placeholder="Nhập số điện thoại" required>
                                <button class="sendNum">Gọi điện</button>
                            </div>
                        </form>
                    </div>
                    <div class="relate-news">
                        <h2 class="rs">BÀI VIẾT LIÊN QUAN</h2>
                        <ul class="content rs">
                            @foreach ($post->related_posts as $rPost)
                                <li><a href="{{url($rPost->slug.'.html')}}">{{$rPost->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ads-bt-detail">
                        <h2 class="rs">Sản phẩm liên quan</h2>
                        @foreach ($siteBanners as $banner)
                            @if ($banner->position_id == 6)
                                <div class="content">
                                   <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="" width="704" height="123" class="imgFull"></a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="comment-bottom">
                        <div class="fb-comments" data-href="{{url($post->slug.'.html')}}" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            @else
                <div class="steps">
                    <h2 class="rs">{{$post->title}}</h2>
                </div>
                <div class="list-news">
                    <div class="news">
                        @foreach ($posts as $uPost)
                            <div class="post post-news">
                                <div class="post-content">
                                    <a href="{{url($uPost->slug.'.html')}}" title="{{$uPost->title}}" class="img-title">
                                        <img src="{{url('img/cache/224x135', $uPost->image)}}" alt="" width="224" height="135" class="imgFull">
                                    </a>
                                    <a href="{{url($uPost->slug.'.html')}}" class="name" title="Giảo cổ lam"> {{$uPost->name}}</a>
                                    <a href="{{url($uPost->slug.'.html')}}" class="title" title="Tên khoa học">
                                        {{$uPost->s_name}}
                                    </a>
                                    <div class="sumary">
                                        {{$uPost->desc}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
       @include('frontend.right')
    </div>
@endsection
