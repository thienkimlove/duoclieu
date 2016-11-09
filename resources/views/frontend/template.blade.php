<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    @include('frontend.meta')
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/common.css')}}">
    @if (isset($page) &&  $page == 'index')
     <link rel="stylesheet" href="{{url('frontend/css/home.css')}}">
    @elseif (isset($page) &&  $page == 'lien-he')
        <link rel="stylesheet" href="{{url('frontend/css/lienhe.css')}}">
    @elseif (isset($page) &&  $page == 'phan-phoi')
        <link rel="stylesheet" href="{{url('frontend/css/htphanphoi.css')}}">
    @elseif (isset($page) &&  $page == 'hoi-dap')
        <link rel="stylesheet" href="{{url('frontend/css/tuvancg.css')}}">
   @elseif (isset($page) &&  $page == 'video')
        <link rel="stylesheet" href="{{url('frontend/css/video.css')}}">
    @else
        @if ((isset($category_page_type) && $category_page_type == 'normal') || (isset($page) && $page == 'tag') || (isset($page) && $page == 'search'))
        <link rel="stylesheet" href="{{url('frontend/css/bantinDl.css')}}">
        @elseif (isset($category_page_type) && $category_page_type == 'special')
            <link rel="stylesheet" href="{{url('frontend/css/dlcaythuoc.css')}}">
        @else
            <link rel="stylesheet" href="{{url('frontend/css/chitiet.css')}}">
        @endif
    @endif
</head>
<body>
<div class="wrapper home pr">
    @include('frontend.header')
    <section class="body pr">
        @if (isset($page) && $page == 'index')
            <div class="block-1">
                <div class="fixCen">
                    <div id="slider-1" class="pr">
                        @foreach ($siteBanners as $banner)
                            @if ($banner->postion_id == 3)
                                <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="" width="731" height="352"></a>
                            @endif
                        @endforeach
                    </div>
                    <div id="slide-preview"></div>
                </div>
            </div>
        @else
            <div class="fixCen">
                <div class="ads-top">
                    @foreach ($siteBanners as $k => $banner)
                        @if ($banner->postion_id == 4)
                            <a href="{{ $banner->url }}" class="ads-top{{$k+1}}"><img src="{{url('files', $banner->image)}}" class="imgFull" width="539" height="153"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        @yield('content')
        @if ($featureProducts)
            <div class="products">
                <div class="fixCen">
                    <h2 class="rs">SẢN PHẨM NỔI BẬT</h2>
                    <div id="slider-2">
                        @foreach ($featureProducts as $product)
                            <div class="item">
                                <img src="{{url('img/cache/220x140', $product->image)}}" alt="{{$product->title}}" width="220" height="140">
                                <div class="pro-name">{{$product->title}}</div>
                                <div class="des">{{$product->desc}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="others">
            <div class="fixCen">
                <div class="about-us content" id="about-us">
                    <span>Về chúng tôi</span>
                    <div class="links">
                        <a href="#" title="Giới thiệu">Giới thiệu</a>
                        <a href="#" title="Bản tin dược liệu">Bản tin dược liệu</a>
                        <a href="#" title="Danh mục dược liệu">Danh mục dược liệu</a>
                        <a href="#" title="Tra cứu theo bệnh">Tra cứu theo bệnh</a>
                        <a href="#" title="Dược liệu online">Dược liệu online</a>
                        <a href="#" title="Tư vấn">Tư vấn</a>
                        <a href="#" title="Chăm sóc sức khỏe">Chăm sóc sức khỏe</a>
                        <a href="#" title="Liên hệ mua hàng">Liên hệ mua hàng</a>
                        <a href="#" title="Video">Video</a>
                        <a href="#" title="Sản phẩm hot">Sản phẩm hot</a>
                    </div>
                </div>
                <div class="medicines content" id="medicines">
                    <span>Dược liệu</span>
                    <div class="links">
                        @foreach ($medicineCategories->index_posts as $post)
                            <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}">{{$post->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="searchByDisease content" id="searchByDisease">
                    <span>Tra cứu theo bệnh</span>
                    <div class="links">
                        @foreach ($diseaseCategories->index_posts as $post)
                            <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}">{{$post->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="fanpage content" id="fanpage-box">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F9kiem.mobile%2F&tabs=timeline&width=360&height=158&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="360" height="158" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
</div>
</body>
<script src="{{url('frontend/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="{{url('frontend/js/search.js')}}"></script>
<script src="{{url('frontend/js/SmoothScroll.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/home.js')}}" type="text/javascript"></script>
</html>