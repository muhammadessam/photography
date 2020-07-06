@extends('site.layouts.base')

@section('content')
<section class="my-5">
    <div class="container">
      <div class="my-shadow py-4">
        <div class="dif">
          <h4 class="text-center font-weight-bold">تعدبل بياناتي</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>
        @if(session()->has('msg'))
            <div class="row mt-4">
                <div class="col-12">
                    <div class="alert alert-success">{{ session()->get('msg') }}</div>
                </div>
            </div>
        @endif
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
            <form method="POST" action="{{ route('account.update', ['id' => auth()->id()]) }}">
                <div class="row m-0 p-0">
                <div class="form-group col-md-6 ">
                    <div class="row w-100 m-0 p-0">
                    <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإسم :</div>
                    <div class="pl-0 col-sm-12 pr-0 "> <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required></div>
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <div class="row w-100 m-0 p-0">
                    <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">البريد الإلكترونى:
                    </div>
                    <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required></div>
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <div class="row w-100 m-0 p-0">
                    <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">كلمة مرور جديدة:</div>
                    <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <div class="row w-100 m-0 p-0">
                    <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">رقم الهاتف:</div>
                    <div class="pl-0 col-sm-12 pr-0 "> <input type="number" name="phone" value="{{ auth()->user()->customer->phone ? auth()->user()->customer->phone : '' }}" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <div class="row w-100 m-0 p-0">
                    <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">أعد ادخال كلمة مرور:</div>
                    <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password_confirmation" class="form-control" ></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="row w-100 m-0 p-0">
                    <div class="">
                        <div class="form-group text-right">
                        <label class="font-weight-bold" for="city_id">المدينة: </label>
                        <select name="city_id" class="form-control py-0 " id="city_id">
                            @foreach ($cities as $city)                                        
                                <option value="{{ $city->id }}" {{ auth()->user()->customer->city == $city->id ? 'selected' : null }}>{{ $city->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-12 mb-5">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">تسجيل</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection
