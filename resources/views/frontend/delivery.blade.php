@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2> <span class="arrow-step"></span>
                <h3 class="rs"><a href="{{url('phan-phoi')}}" title="Hệ thống phân phối">Hệ thống phân phối</a></h3>
            </div>
            <div class="content">
                <h2 class="rs">SẢN PHẨM NỐI BẬT</h2>
                <form action="" id="searchProduct">
                    <label for="">TÌM KIẾM THEO</label>
                    <div class="form-timsp">
                        <select name="city" id="byProvine">
                            <option value="">Chọn tỉnh, thành phố...</option>
                            @foreach (config('delivery')['city'] as $id => $city)
                            <option value="{{$id}}">{{$city}}</option>
                            @endforeach
                        </select>
                        <button id="searchPro">
                            <img src="{{url('frontend/images/icon-search.png')}}" alt="" width="30" height="27" class="imgFull">
                        </button>
                    </div>
                </form>
                <div class="places">
                    @foreach ($totalDeliveries as $area => $cities)
                       <div class="places1">
                        <span class="captain">{{$area}}</span>
                        <div class="provines">
                            @foreach ($cities->chunk(6) as $partCities)
                                @foreach ($partCities as $city)
                                    <a href="{{url('phan-phoi/'. $city->id)}}" title="">{{config('delivery')['city'][$city->city]}}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('frontend.right')
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#searchPro').click(function(e){
                e.preventDefault();
                var cityId = $('#byProvine').val();
                window.location.href ='/phan-phoi/' + cityId;
            })
        });
    </script>
@endsection