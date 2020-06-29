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
                <div class="col-12">
                    <div class="card" id="orderApp">
                        <div class="card-body">
                            <form action="{{route('admin.orders.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="customer_id">اختر عميل :</label>
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                @foreach(\App\Customer::all() as $item )
                                                    <option {{old('customer_id')==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item->user->name}}</option>
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
                                                    <option {{old('cat_id')==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
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
                                                <option {{old('status')=='waiting' ? 'selected':''}} value="waiting">انتظار</option>
                                                <option {{old('status')=='accepted' ? 'selected':''}} value="accepted">تم القبول</option>
                                                <option {{old('status')=='billed' ? 'selected':''}} value="billed">اصدار قاتورة غير مسددة</option>
                                                <option {{old('status')=='waiting' ? 'selected':''}} value="waiting">القبول نهائيا</option>
                                                <option {{old('status')=='rejected' ? 'selected':''}} value="rejected">مرفوضة</option>
                                            </select>
                                            <x-error name="status"></x-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country_id">المدينة :</label>
                                            <select class="form-control" @change="changeCountry($event)" name="country_id" id="country_id">
                                                <option value="">اختر ..</option>
                                                <option v-for="country in countries" :value="country.id"  >@{{ country.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city_id">الحي :</label>
                                            <select class="form-control" name="city_id" id="city_id">
                                                <option v-for="city in cities" :value="city.id" >@{{ city.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">العنوان :</label>
                                            <input class="form-control" type="text" name="address" id="address">
                                            <x-error name="address"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="date">موعد المناسبة التاريخ والوقت :</label>
                                            <input class="form-control" type="datetime-local" name="date" id="date">
                                            <x-error name="date"></x-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="is_special">نوع المناسبة خاصة / عام :</label>
                                            <select class="form-control" name="is_special" id="is_special">
                                                <option value="1">خاصة</option>
                                                <option value="0">عامة</option>
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
                                                <option value="1">نعم</option>
                                                <option value="0">لا</option>
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
                                                <option value="1">نعم</option>
                                                <option value="0">لا</option>
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
