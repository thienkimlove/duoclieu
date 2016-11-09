@if (isset($data['title']))
    <p>
        Tiêu đề : {{$data['title']}}
    </p>
@endif
@if (isset($data['ask_person']))
<p>
    Người hỏi : {{$data['ask_person']}}
</p>
@endif
@if (isset($data['ask_email']))
<p>
    Email : {{$data['ask_email']}}
</p>
@endif
@if (isset($data['ask_address']))
<p>
    Địa chỉ : {{$data['ask_address']}}
</p>
@endif
@if (isset($data['ask_phone']))
<p>
    Số điện thoại : {{$data['ask_phone']}}
</p>
@endif
@if (isset($data['question']))
<p>
    Nội dung câu hỏi : {{$data['question']}}
</p>
@endif