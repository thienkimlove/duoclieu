@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2> <span class="arrow-step"></span>
                <h3 class="rs"><a href="{{url('phan-phoi')}}" title="Hệ thống phân phối">Hệ thống phân phối</a></h3>
            </div>
            <div class="detail-news">
                <div class="title"><h3 class="rs">Hệ thống phân phối tại {{config('delivery')['city'][$delivery->city]}}</h3></div>

                <div class="content">
                    <article>
                        {!! $delivery->content !!}
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
                </div>
            </div>
        </div>
       @include('frontend.right')
    </div>
@endsection
