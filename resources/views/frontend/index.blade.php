@extends('frontend.template')

@section('content')

    @if ($indexBlock1Categories)
    <div class="block-2">
        <div class="fixCen">
            <ul class="tabs rs">
                @foreach ($indexBlock1Categories as $k => $cate)
                <li class="{{($k == 0) ? 'tab-1 tab active' : 'tab-'.($k+1).' tab'}}" data-content="#tab-{{$k+1}}">
                    <h3 class="rs"><a href="javascript:void(0)" title="{{$cate->title}}">{{$cate->title}}</a></h3>
                </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($indexBlock1Categories as $k => $cate)
                    <div id="tab-{{$k+1}}" class="{{($k==0)? 'content active' : 'content'}}">
                        @foreach ($cate->index_posts->slice(0,3) as $indexPost)
                          <div class="post">
                            <img src="{{url('img/cache/287x179', $indexPost->image)}}" alt="" width="287" height="179">
                            <h4><a href="{{url($indexPost->slug.'.html')}}" class="title" title="{{$indexPost->title}}">{{$indexPost->title}}</a></h4>
                            <div class="sumary">{{str_limit($indexPost->desc, 85)}}</div>
                            <div class="related-news">
                                @foreach ($indexPost->related_posts->slice(0, 2) as $r_post)
                                <a href="{{url($r_post->slug.'.html')}}" title="{{$r_post->title}}">{{$r_post->title}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="fixCen groups">
        <div class="left-content">
            @if ($indexBlock2Categories)
               <div class="block-2 block-3 pr">
                <ul class="tabs rs">
                    @foreach ($indexBlock2Categories as $k => $cate)
                        <li class="{{($k == 0) ? 'tab-1 tab active' : 'tab-'.($k+1).' tab'}}" data-content="#tab-{{$k+5}}">
                            <h3 class="rs"><a href="javascript:void(0)" title="{{$cate->title}}">{{$cate->title}}</a></h3>
                       </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($indexBlock2Categories as $k => $cate)
                      <div id="tab-{{$k+5}}" class="{{($k==0)? 'content active' : 'content'}}">
                          @if ($firstPost = $cate->index_posts->shift())
                            <div class="hot-news">
                                <div class="post">
                                    <img src="{{url('img/cache/301x183', $firstPost->image)}}" alt="" width="301" height="183">
                                    <h4><a href="{{url($firstPost->slug.'.html')}}" class="title" title="{{$firstPost->title}}">{{$firstPost->title}}</a></h4>
                                    <div class="sumary">{{str_limit($firstPost->desc, 140)}}</div>
                                </div>
                            </div>
                          @endif
                        <div class="news">
                            @foreach($cate->index_posts->slice(0, 3) as $indexPost)
                              <div class="post">
                                <img src="{{url('img/cache/126x90', $indexPost->image)}}" alt="" width="126" height="90">
                                <div class="news-info">
                                    <h4><a href="{{url($indexPost->slug.'.html')}}" class="title" title="{{$indexPost->title}}">{{$indexPost->title}}</a></h4>
                                    <div class="sumary">{{str_limit($indexPost->desc, 120)}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="block-4 pr">
                <h2 class="profesors rs">BAN CỐ VẤN - Ý KIẾN CHUYÊN GIA</h2>
                <div class="intro">
                    <div class="sumary">
                        <div class="border"></div>
                        Với đội ngũ bác sĩ , dược sĩ nhiều năm kinh nghiệm và các chuyên gia hàng đầu của Tuệ Linh. Chung tôi luôn lắng nghe và sẵn sàng tư vấn nhằm đem đến cái nhìn đúng nhất về dược liệu và tiềm năng phát triển dược liệu ở Việt Nam. Đem dược liệu trở thành thế mạnh của ngành dược.
                    </div>
                    <div class="some-info">
                        <div class="doctors">
                            <div class="doc1 doc">
                                <img src="{{url('frontend/images/bs-img1.jpg')}}" alt="" width="168" height="168" class="imgFull">
                                <div class="pos">PGS.TS Thầy thuốc nhân dân</div>
                                <div class="name">Nguyễn Xuân Thành</div>
                            </div>
                            <div class="doc2 doc">
                                <img src="{{url('frontend/images/bs-img2.jpg')}}" alt="" width="168" height="168" class="imgFull">
                                <div class="pos">PGS.TS Thầy thuốc nhân dân</div>
                                <div class="name">Nguyễn Văn Mùi </div>
                            </div>
                        </div>
                        @if ($indexQuestions->count() > 0)
                        <div class="question-list pr">
                            @foreach ($indexQuestions as $question)
                                <a href="{{url('hoi-dap', $question->slug)}}" class="ques" title="{{$question->title}}">{{$question->title}}</a>
                            @endforeach
                            <a href="{{url('hoi-dap')}}" class="ask-question" title="Đặt câu hỏi tại đây">Đặt câu hỏi tại đây</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if ($comments->count() > 0)
            <div class="block-5 pr">
                <h2 class="rs">KHÁCH HÀNG CẢM NHẬN</h2>
                <div class="feeling-of-cus">
                    @foreach ($comments as $comment)
                       <div class="cus">
                        <div class="cus-info">
                            <div class="above">
                                <img src="{{url('img/cache/46x46', $comment->avatar)}}"
                                     alt=""
                                     class="avatar"
                                     width="46"
                                     height="46">
                                <div class="detail-info">
                                    <div class="name"><span class="sex">{{$comment->gender}}</span><span>{{$comment->person}}</span></div>
                                    <div class="address">{{$comment->address}}</div>
                                    <div class="title">{{$comment->title}}</div>
                                </div>
                            </div>
                            <div class="comment">{{str_limit($comment->desc, 140)}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                 @include('frontend.pagination', ['paginate' => $comments])
            </div>
            @endif
        </div>
        @include('frontend.right_index')
    </div>
	
<b:if cond='data:blog.pageType != &quot;item&quot;'>
<div style='display:none;'>
<div itemscope='' itemtype='http://schema.org/Recipe'>
<span itemprop='name'>Dược liệu, dược liệu sạch, mua bán dược liệu, tra cứu dược liệu</span>
<img alt= 'Dược liệu, dược liệu sạch, mua bán dược liệu, tra cứu dược liệu' - itemprop='image'
src= 'http://www.duoclieutuelinh.vn/frontend/images/logo.png' title= 'Dược liệu, dược liệu sạch, mua bán dược liệu, tra cứu dược liệu'/>
<div itemprop='aggregateRating' itemscope=''
itemtype='http://schema.org/AggregateRating'>
<span itemprop='ratingValue'>9</span>/<span itemprop='bestRating'>10</span>
<span itemprop='ratingCount'>1521</span> bình chọn
</div>
</div></div>
</b:if>
@endsection