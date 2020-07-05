@extends('site.layouts.base', ['isAccount' => true])

@section('content')

<section class="my-5 register">
    <div class="container">
        <div class="my-shadow py-4">
            <div class="dif">
                <h4 class="text-center font-weight-bold">طلب مناسبة</h4>
                <span class="d-block text-center"> <img src="{{ asset('images/flower.svg') }}" alt=""></span>
            </div>

            <div class="  main-login">
                <div class="  login-cont">
                    <div class=" login-div login-div2">
                        <div class="">
                            <div class=" content-log">
                                <div class="mt-4">
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{ route('account.orders.store') }}" method="POST">
                                        <div class="row m-0 p-0">
                                        <div class="form-group col-md-6 ">
                                            <div class="row w-100 m-0 p-0">
                                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">العنوان:</div>
                                            <div class="pl-0 col-sm-12 pr-0 "> <input type="text" name="address" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="row w-100 m-0 p-0">
                                            <div class="col-12 p-0">
                                                <div class="form-group text-right">
                                                <label class="font-weight-bold" for="section_input">القسم: </label>
                                                <select name="cat_id" class="form-control py-0 " id="section_input">
                                                    @foreach ($categories as $cat)                                        
                                                        <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : null }}>{{ $cat->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="row w-100 m-0 p-0">
                                            <div class="col-12 p-0">
                                                <div class="form-group text-right">
                                                <label class="font-weight-bold" for="section_input">المدينة: </label>
                                                <select name="city_id" class="form-control py-0 " id="section_input">
                                                    @foreach ($cities as $city)                                        
                                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : null }}>{{ $city->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-right">
                                            <label class="font-weight-bold" for="">نوع المناسبة:</label>
                                            <div class="d-block d-flex">
                                                <div>
                                                <div class="ml-4"><input name="is_special" type="radio" class="ml-2" id="special" value="1"><label
                                                    for="special"> خاص</label></div>
                                                </div>
                                                <div>
                                                <div><input name="is_special" type="radio" class="ml-2" id="public" value="0"><label
                                                    for="public">عام</label></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-right">
                                            <label class="font-weight-bold" for="">اضافة حقوقنا على التصميم:</label>
                                            <div class="d-block d-flex">
                                                <div>
                                                <div class="ml-4"><input name="is_right_print" type="radio" value="1" class="ml-2"
                                                    id="yes_right"><label for="yes_right"> نعم</label></div>
                                                </div>
                                                <div>
                                                <div><input name="is_right_print" type="radio" class="ml-2" value="0" id="no_right"><label
                                                    for="no_right">لا</label></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-right">
                                            <label class="font-weight-bold" for="">عرض المناسبة على صفحتنا:</label>
                                            <div class="d-block d-flex">
                                                <div>
                                                <div class="ml-4"><input name="is_on_our_page" type="radio" value="1" class="ml-2" id="yes_cle"><label
                                                    for="yes_cle"> نعم</label></div>
                                                </div>
                                                <div>
                                                <div><input name="is_on_our_page" type="radio" value="0" class="ml-2" id="no_cle"><label
                                                    for="no_cle">لا</label></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-right">
                                            <label class="font-weight-bold mb-0" for="">وقت المناسبة:</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <div class="row w-100 m-0 p-0">
                                                <div class="pr-0 col-sm-12 mb-2  c-bol font-weight-bold ">التاريخ:</div>
                                                <div class="pl-0 col-sm-12 pr-0 "> 
                                                    <input required type="datetime-local" name="date" class="form-control" id="datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label class="font-weight-bold" for="section_input">اليوم: </label>
                                            <select name="day" id="day" class="form-control" required>
                                                <option value="السبت">السبت</option> 
                                                <option value="الاحد">الاحد</option> 
                                                <option value="الاثنين">الاثنين</option> 
                                                <option value="الثلاثاء">الثلاثاء</option> 
                                                <option value="الاربعاء">الاربعاء</option> 
                                                <option value="الخميس">الخميس</option> 
                                                <option value="الجمعة">الجمعة</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">ارسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection
