@extends('frontend.template')
@section('content')
    <div class="fixCen main-content groups">
        <div class="left-content">
            <div class="steps">
                <h2 class="rs">TƯ VẤN CHUYÊN GIA</h2>
            </div>
            <div class="content">
                <div class="block-1">
                    <div class="doctors">
                        <div class="doc1 doc">
                            <img src="{{url('frontend/images/bs-img1.jpg')}}" alt="" width="168" height="168" class="imgFull">
                            <div class="pos">PGS.TS Thầy thuốc nhân dân</div>
                            <div class="name">Nguyễn Xuân Thành</div>
                        </div>
                        <div class="doc2 doc">
                            <img src="{{url('frontend/images/bs-img2.jpg')}}" alt="" width="168" height="168" class="imgFull">
                            <div class="pos">PGS.TS Thầy thuốc nhân dân</div>
                            <div class="name">Lương đình của</div>
                        </div>
                    </div>
                    <div class="sumary">
                        Với đội ngũ bác sĩ , dược sĩ nhiều năm kinh nghiệm và các chuyên gia hàng đầu của hãng dược phẩm Pleuran.
                        Chúng tôi luôn lắng nghe và sẵn sàng tư vấn với mong muốn mang tới sức khỏe toàn diện cho thế hệ mầm non Việt Nam.
                    </div>
                </div>
                <div class="block-2">
                    @foreach ($questions as $k => $question)
                    <div class="post-cure">
                        <div class="ask-title">{{$k+1}}. {{$question->title}}</div>
                        <div class="info">
                            Người gửi: {{$question->ask_person}}
                            <span class="date"> - {{$question->updated_at->format('D/m/Y')}}</span>
                            <div class="question">
                                Câu hỏi: {{$question->question}}
                            </div>
                            <details>
                                <summary>Xem câu trả lời</summary>
                               {{$question->answer}}
                            </details>
                        </div>
                    </div>
                    @endforeach
                    @include('frontend.pagination', ['paginate' => $questions])


                    {!! Form::open(array('url' => 'save_question', 'class' => 'get-ask')) !!}
                        <input type="text" name="ask_person" placeholder="Họ và tên" required>
                        <input type="tel" name="ask_phone" placeholder="Số điện thoại" required>
                        <input type="email" name="ask_email" placeholder="Email" required>
                        <input type="text" name="ask_address" placeholder="Địa chỉ" required>
                        <input type="text" name="question" placeholder="Nội dung" required>
                        <div class="btns">
                            <button type="button">Gửi</button>
                            <button type="reset">Làm lại</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
       @include('frontend.right')
    </div>
@endsection    