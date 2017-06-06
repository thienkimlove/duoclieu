<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>{{$meta_title}}</title>
    <meta property="og:description" content="{{$meta_desc}}">
    @include('frontend.meta')
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/common.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/'.$page_css.'.css')}}">
   
</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{{env('FB_ID')}}',
            xfbml      : true,
            version    : 'v2.8'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper home pr">
    @include('frontend.header')
    <section class="body pr">
        @if (isset($page) && $page == 'index')
            <div class="block-1">
                <div class="fixCen">
                    <div id="slider-1" class="pr">
                        @foreach ($siteBanners as $banner)
                            @if ($banner->position_id == 3)
                                <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="" width="731" height="352"></a>
                            @endif
                        @endforeach
                    </div>
                    <div id="slide-preview"><img src="" /></div>
                </div>
            </div>
        @else
            <div class="fixCen">
                <div class="ads-top">
                    @foreach ($siteBanners as $k => $banner)
                        @if ($banner->position_id == 4)
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
                                <a href="{{$product->link}}"><img src="{{url('img/cache/303x244', $product->image)}}" alt="{{$product->title}}" width="220" height="140"></a>
                                <div class="pro-name"><a href="{{$product->link}}">{{$product->title}}</a></div>
                                <div class="des">{{str_limit($product->desc, 140)}}</div>
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
                        @foreach ($medicineCategories->index_long_posts as $post)
                            <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}">{{$post->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="searchByDisease content" id="searchByDisease">
                    <span>Tra cứu theo bệnh</span>
                    <div class="links">
                        @foreach ($diseaseCategories->index_long_posts as $post)
                            <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}">{{$post->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="fanpage content" id="fanpage-box">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FduoclieuTuelinh&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1851182988497274" width="100%" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91609816-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
<script src="{{url('frontend/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="{{url('frontend/js/search.js')}}"></script>
<script src="{{url('frontend/js/SmoothScroll.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/js/home.js')}}" type="text/javascript"></script>
@yield('script')
</html>