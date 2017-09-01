@foreach ($siteBanners as $banner)
    @if ($banner->position_id == 1)
        <div class="banner-ads left">
            <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="" width="171" height="454"></a>
        </div>
    @endif
    @if ($banner->position_id == 2)
        <div class="banner-ads right">
            <a href="{{$banner->url}}"><img src="{{url('files', $banner->image)}}" alt="" width="171" height="454"></a>
        </div>
    @endif
@endforeach


<header class="pr">
    <div class="bg-top">
        <a href="javascript:void(0)" class="miniMenu-btn pa open-top-nav" data-menu="#top-nav"><span></span></a>
        <a href="javascript:void(0)" class="miniMenu-btn pa open-main-nav" data-menu="#main-nav"></a>
    </div>
    <nav id="top-nav" class="menu-mb">
        <ul class="fixCen pr rs">
            <li><a href="http://www.giaocolam.vn" title="Giảo cổ lam" class="active">Giảo cổ lam</a></li>
            <li><a href="#" title="Sâm cau">Sâm cau</a></li>
            <li><a href="#" title="Nhung hươu">Nhung hươu</a></li>
            <li><a href="#" title="Sữa ong chúa">Sữa ong chúa</a></li>
            <li><a href="#" title="Ráy gai">Ráy gai</a></li>
            <li><a href="#" title="Mạ mân">Mạ mân</a></li>
            <li><a href="#" title="An xoa (tổ kén)">An xoa (tổ kén)</a></li>
            <li><a href="http://www.cagaileo.vn" title="Cà gai leo">Cà gai leo</a></li>
        </ul>
    </nav>
    <div class="setBg">
        <div class="fixCen head-info">
            <h1 class="rs"><a href="{{url('/')}}" class="logo" title="Dược liệu Tuệ Linh" target="_blank">
                    <img src="{{url('frontend/images/logo.png')}}" alt="Dược liệu Tuệ Linh" width="224" height="87" class="imgFull">
                </a></h1>
            <span class="slogan">
                    chung tay đưa dược liệu thành thế mạnh của ngành dược việt nam
                </span>
            <span class="hotline" id="hotline">
                    <a href="tel:19006639">
                        <img src="{{url('frontend/images/hotline.png')}}" alt="" width="215" height="84" class="imgFull">
                    </a>
                </span>
        </div>
    </div>
    <nav id="main-nav" class="menu-mb">
        <ul class="fixCen pr rs">
            <li>
                <a href="{{url('/')}}" class="{{(isset($page) && $page == 'index') ? 'active' : ''}}" title="Trang chủ">
                    Trang chủ
                    <img src="{{url('frontend/images/home-icon.png')}}" alt="Trang chủ" width="64" height="42">
                </a>
            </li>
            @foreach ($headerCategories as $headerCategory)
                @if ($headerCategory->subCategories->count() > 0)
                    <li class="parentMenu">
                        <a href="{{url($headerCategory->slug)}}"
                           title="{{$headerCategory->title}}"
                           class="{{(isset($page) && ($page == $headerCategory->slug || in_array($page, $headerCategory->subCategories->pluck('slug')->all()))) ? 'active' : ''}}">{{$headerCategory->title}}</a>

                        <ul class="submenu">
                            @foreach ($headerCategory->subCategories as $childCategory)
                              <li><a class="{{(isset($page) && $page == $childCategory->slug) ? 'active' : ''}}" href="{{url($childCategory->slug)}}" title="{{$childCategory->title}}">{{$childCategory->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li><a href="{{url($headerCategory->slug)}}" class="{{(isset($page) && $page == $headerCategory->slug) ? 'active' : ''}}" title="{{$headerCategory->title}}">{{$headerCategory->title}}</a></li>
                @endif
            @endforeach

            <li><a href="{{url('hoi-dap')}}" title="Tư vấn chuyên gia">Tư vấn chuyên gia</a></li>
            <li><a href="{{url('video')}}" title="Video">Video</a></li>
            <li><a href="{{url('phan-phoi')}}" title="Phân phối">Phân phối</a></li>
            <li><a href="{{url('lien-he')}}" title="Liên hệ">Liên hệ</a></li>
        </ul>
    </nav>
</header>