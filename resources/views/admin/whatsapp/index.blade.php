@extends('admin.layout.layout')
@section("content")
    <div class="container pt-3">
        <div class="card" id="root">
            <div class="card-header">
                ارسال رسالة واتسابْ
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>الرسالة</label>
                    <textarea rows="20" v-model="msg" class="form-control">
                    </textarea>
                </div>
                <a :href='"https://wa.me/"+phone+"?text="+Encoding(msg)'
                   target="_blank" class="btn btn-success">ارسال</a>
            </div>
        </div>
    </div>
    <script>
        const App = new Vue({
            el:"#root",
            data:{
                msg:"",
                phone:"{{$phone}}",
            },
            methods:{
                /**
                 * @return {string}
                 */
                Encoding(msg){
                    return encodeURI(msg);
                }
            }
        });
    </script>
@endsection
