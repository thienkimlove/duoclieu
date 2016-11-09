@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                @if ($post->category->parent_id)
                <h2 class="rs">
                    <a href="{{url($post->category->parent()->slug)}}" title="{{$post->category->parent()->title}}">{{$post->category->parent()->title}}}</a>
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
                        <div class="bnt-like-fb">
                            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F9kiem.mobile%2F&width=58&layout=box_count&action=like&size=small&show_faces=false&share=false&height=65&appId" width="58" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        </div>
                        <div class="btn-like-gg">
                            <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                            <div class="g-plusone" data-size="tall" data-href="{{url($post->slug.'.html')}}"></div>
                        </div>
                        <div class="btn-share-fb">
                            <img src="{{url('frontend/images/iflike.jpg')}}" alt="" class="if-like imgFull" width="242" height="32">
                            <a href="javascript:void(0)" title="Share lên fanpage">
                                <img src="{{url('frontend/images/fb-share-btn.png')}}" alt="" width="235" height="48" class="btn-like imgFull">
                            </a>
                        </div>
                    </div>
                    <div class="data-tags">
                        <span>Từ khóa: </span>
                        @foreach ($post->tags as $tag)
                            <a href="{{url('tag/'.$tag->slug)}}" title="">{{$tag->name}}</a>
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
                        <h4 class="rs">BÌNH LUẬN</h4>
                        <div class="content">
                            <img src="{{url('frontend/images/avatar-icon.jpg')}}" alt="" class="avatar-cmt" width="46" height="46">
                            <div class="cmt">
                                <input type="text" placeholder="Thêm bình luận...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @include('frontend.right')
    </div>
@endsection
