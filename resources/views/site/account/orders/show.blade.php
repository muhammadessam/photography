@extends('site.layouts.base', ['isAccount' => true])

@section('content')

<section class="my-5 register">
    <div class="container">
        <div class="my-shadow py-4">
            <div class="dif">
                <h4 class="text-center font-weight-bold"> تفاصيل الطلب</h4>
                <span class="d-block text-center"> <img src="{{ asset('images/flower.svg') }}" alt=""></span>
            </div>
            <div class="row px-5 mt-4">
                <div class="col-12 mb-4">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link c-bol active" data-toggle="tab" href="#details">تفاصيل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol" data-toggle="tab" href="#comments">التعليقات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol" href="#">الفواتير</a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="tab-content px-5">
                <div class="tab-pane active" id="details">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h4 class="mb-3 mt-3">العنوان </h4>
                            <span>{{ $order->address }}</span>
                            <h4 class="mb-3 mt-3">الوقت </h4>
                            <span>{{ $order->date->toDateTimeString() }}</span>
                            <h4 class="mb-3 mt-3">الحالة </h4>
                            <span>{{ $order->get_status() }}</span>
                            <h4 class="mb-3 mt-3">اضافة حقوقنا علي التصميم </h4>
                            <span>{{ $order->is_right_print ? 'نعم' : 'لا' }}</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h4 class="mb-3 mt-3">القسم </h4>
                            <span>{{ $order->category->name }}</span>
                            <h4 class="mb-3 mt-3">نوع المناسبة </h4>
                            <span>{{ $order->is_special ? 'خاصة' : 'عامة' }}</span>
                            <h4 class="mb-3 mt-3">المدينة  </h4>
                            <span>{{ $order->city->name }}</span>
                            <h4 class="mb-3 mt-3">عرض المناسبة علي صفحاتنا  </h4>
                            <span>{{ $order->is_on_our_page ? 'نعم' : 'لا' }}</span>
                        </div>
                    </div>                    
                </div>
                <div class="tab-pane" id="comments">
                    <div id="comments-list">
                        @foreach ($order->comments as $comment)                            
                            <div class="py-1">
                                <strong class="d-block">{{ $comment->is_admin ? 'الإدارة' : auth()->user()->name }}</strong>
                                <span style="font-size:11px;">{{ $comment->created_at }}</span>
                                <p>{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('account.comments.store') }}" method="post" class="mt-3">
                        <div class="form-group">
                            <label for="body">محتوي التعليق</label>
                            <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="button" id="post-comment" class="btn-outline-success btn">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('js')
    <script>
        $('#post-comment').on('click', function () {

            var commentBody = $('textarea[name="body"]').val();
            $this = this;
            $($this).html('جاري إرسال <i class="fa fa-spinner fa-spin"></i>')
            $($this).prop('disabled', true)
            $('textarea[name="body"]').prop('disabled', true)

            $.ajax({
                url: "/account/comments/store",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    order_id: {{ $order->id }},
                    is_admin: 0,
                    body: commentBody
                },
                dataType: "JSON",
                success: function (data) {

                    console.log(data)
                    if (data.status == 200) {
                        // clear comment box
                        $('textarea[name="body"]').val('');
                        // add this comment to comments list
                        $('#comments-list').append(`
                        <div class="py-1">
                            <strong class="d-block">{{ auth()->user()->name }}</strong>
                            <span style="font-size:11px;">منذ قليل</span>
                            <p>`+commentBody+`</p>
                        </div>
                        `)
                        // reset
                        $($this).html('أرسل')
                        $($this).prop('disabled', false)
                        $('textarea[name="body"]').prop('disabled', false)
                    }
                },
                error: function (error) {
                    console.log(error);
                    // reset
                    $($this).html('أرسل')
                    $($this).prop('disabled', false)
                    $('textarea[name="body"]').prop('disabled', false)
                }
            });

        });
    </script>
@endsection