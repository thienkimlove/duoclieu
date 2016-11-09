@extends('frontend.template')

@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs">
                    <a href="{{url('/')}}" title="Trang chủ">Trang chủ</a>
                </h2>
                <span class="arrow-step"></span>
                <h3 class="rs"><a href="{{url('lien-he')}}" title="liên hệ">liên hệ</a></h3>
            </div>
            <div class="content">
                {!! Form::open(array('url' => 'save_question', 'id' => 'contact')) !!}
                    <div class="form-row">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="ask_person" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-row">
                        <label for="phone">Điện thoại</label>
                        <input type="tel" name="ask_phone" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email</label>
                        <input type="email" name="ask_email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-row">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" placeholder="Nhập tiêu đề" required>
                    </div>
                    <div class="form-row">
                        <label for="content">Nội dung</label>
                        <textarea name="question" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                    </div>
                    {{--<div class="errors">A có thể show lỗi ở đây, nếu không thì xóa dòng này đi :))</div>--}}
                    <div class="contain-btn form-row">
                        <button type="button">Gửi</button>
                        <button type="reset">Nhập lại</button>
                    </div>
                {!! Form::close() !!}
                <div class="address-group">
                    Địa chỉ liên hệ <br>
                    <strong>Tại Hà Nội</strong><br>
                    Tầng 5, tòa nhà 29T1, phố Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội. <br>
                    Điện thoại: (04) 62824263 <br>
                    Fax: 0426824263 <br> <br>
                    <strong>Chi nhánh Hồ Chí Mình</strong> <br>
                    156/17 Tô Hiến Thành - P15 - Quận 10, TP.HCM <br>
                    Điện thoại: (083) 9797779 <br>
                    Fax: 0862648632 <br>
                    Đường dây nóng: 0912571190
                </div>
                <div class="embed-ggmap">
                    <img src="{{url('frontend/images/gg-map.jpg')}}" alt="" class="imgFull" width="728" height="425">
                </div>
            </div>
        </div>
        @include('frontend.right')
    </div>
@endsection