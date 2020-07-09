@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="orderApp">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.orders.update', $order)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="customer_id">اختر عميل :</label>
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                @foreach(\App\Customer::all() as $item )
                                                    <option {{$order['customer_id']==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item->user->name}}</option>
                                                @endforeach
                                            </select>
                                            <x-error name="customer_id"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="customer_id">اختر القسم :</label>
                                            <select class="form-control" name="cat_id" id="cat_id">
                                                @foreach(\App\Category::all() as $item )
                                                    <option {{$order['cat_id']==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                            <x-error name="cat_id"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="customer_id">اختر الحالة :</label>
                                            <select class="form-control" name="status" id="status">
                                                <option {{$order['status']=='waiting' ? 'selected':''}} value="waiting">انتظار</option>
                                                <option {{$order['status']=='accepted' ? 'selected':''}} value="accepted">تم القبول</option>
                                                <option {{$order['status']=='billed' ? 'selected':''}} value="billed">اصدار قاتورة غير مسددة</option>
                                                <option {{$order['status']=='final' ? 'selected':''}} value="final">القبول نهائيا</option>
                                                <option {{$order['status']=='rejected' ? 'selected':''}} value="rejected">مرفوضة</option>
                                            </select>
                                            <x-error name="status"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="country_id">المدينة :</label>
                                            <select required class="form-control" @change="changeCountry($event)" name="country_id" id="country_id">
                                                @if ($order->country)                                                    
                                                    <option value="{{$order->country->id}}">{{$order->country->name}}</option>
                                                @endif
                                                <option v-for="country in countries" :value="country.id"  >@{{ country.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="city_id">الحي :</label>
                                            <select required class="form-control" name="city_id" id="city_id">
                                                <option value="{{$order->city->id}}">{{$order->city->name}}</option>
                                                <option v-for="city in cities" :value="city.id" >@{{ city.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="day">اليوم :</label>
                                            <select class="form-control" name="day" id="day">
                                                <option value="{{$order->day}}">{{$order->day}}</option>
                                                <option  value="السبت" >السبت</option>
                                                <option  value="الاحد" >الاحد</option>
                                                <option  value="الاثنين" >الاثنين</option>
                                                <option  value="الثلاثاء" >الثلاثاء</option>
                                                <option  value="الاربعاء" >الاربعاء</option>
                                                <option  value="الخميس" >الخميس</option>
                                                <option  value="الجمعة" >الجمعة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">العنوان :</label>
                                            <input class="form-control" type="text" name="address" id="address" value="{{$order['address']}}">
                                            <x-error name="address"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="date">موعد المناسبة التاريخ والوقت :</label>
                                            <input class="form-control" type="datetime-local" name="date" id="date" value="{{\Carbon\Carbon::parse($order['date'])->format('Y-m-d\TH:i')}}">
                                            <x-error name="date"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="is_special">نوع المناسبة خاصة / عام :</label>
                                            <select class="form-control" name="is_special" id="is_special">
                                                <option    {{$order['is_special'] ? 'selected' : ''}}     value="1">خاصة</option>
                                                <option    {{!$order['is_special'] ? 'selected' : ''}}    value="0">عامة</option>
                                            </select>
                                            <x-error name="is_special"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="is_special">اضافة حقوقنا علي التصميم :</label>
                                            <select class="form-control" name="is_right_print" id="is_right_print">
                                                <option  {{$order['is_right_print'] ? 'selected' : ''}}  value="1">نعم</option>
                                                <option  {{!$order['is_right_print'] ? 'selected' : ''}} value="0">لا</option>
                                            </select>
                                            <x-error name="is_right_print"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="is_special">عرض المناسبة علي صفحاتنا :</label>
                                            <select class="form-control" name="is_on_our_page" id="is_on_our_page">
                                                <option  {{$order['is_on_our_page'] ? 'selected' : ''}}  value="1">نعم</option>
                                                <option  {{!$order['is_on_our_page'] ? 'selected' : ''}} value="0">لا</option>
                                            </select>
                                            <x-error name="is_on_our_page"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> حفظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="cats"></x-datatable>
    <script>
        const order = new Vue({
            el:'#orderApp',
            data:{
                countries:[],
                cities:[],
            },
            methods:{
                loadC(){
                    axios.get('{{route('admin.api_countries')}}').then((data)=>{
                        this.countries = data.data.data;
                    })
                },
                changeCountry(country){
                    var id = country.target.value ;
                    for (var i = 0 ;i < this.countries.length ;i++){
                        if(this.countries[i].id == id ){
                            this.cities = this.countries[i].cities;
                        }
                    }
                },
            },
            created(){
                this.loadC();
            }
        });
    </script>
@endsection
