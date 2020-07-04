@extends('site.layouts.index')

@section('content')
<section class="my-5 register">
    <div class="container">
      <div class="my-shadow py-4">
        <div class="dif">
          <h4 class="text-center font-weight-bold">التسجيل</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>

        <div class="  main-login">
          <div class="  login-cont">
            <div class=" login-div login-div2">
              <div class="">
                <div class=" content-log">
                  <div class="mt-4">
                    <div class="row m-0 p-0"">
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
                    <form method="POST" action="{{ route('register') }}">
                      <div class="row m-0 p-0">
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإسم الكريم:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">البريد الإلكترونى:
                            </div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" value="{{ old('email') }}" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">رقم الهاتف:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الرقم السرى:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="row w-100 m-0 p-0">
                            <div class="">
                              <div class="form-group text-right">
                                <label class="font-weight-bold" for="city_id">المدينة: </label>
                                <select name="city_id" class="form-control py-0 " id="city_id">
                                    @foreach ($cities as $city)                                        
                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : null }}>{{ $city->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group text-right">
                          <label class="font-weight-bold" for="activation">التفعيل:</label>
                          <div class="d-block d-flex">
                            <div>
                              <div class="ml-4"><input name="activate_now" type="radio" class="ml-2" id="activate_now"><label
                                  for="activate_now"> مباشرة</label></div>
                            </div>
                            <div>
                              <div><input name="email_activation" type="radio" class="ml-2" id="email_activation"><label
                                  for="email_activation">عبر البريد الإلكترونى</label></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">تسجيل</button>
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
