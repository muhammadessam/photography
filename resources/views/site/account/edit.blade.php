@extends('site.layouts.base')

@section('content')
<section class="my-5">
    <div class="container main-edit">
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
      @if(auth()->guard('employee')->check())
          <div class="mt-4 p-3">
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
              <form action="{{route('admin.employees.update',$employee)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label for="name">الاسم</label>
                      <input type="text" class="form-control" value="{{$employee->name}}" name="name" id="name">
                  </div>
                  <div class="form-group">
                      <label for="email">البريد</label>
                      <input type="email" class="form-control" value="{{$employee->email}}" name="email" id="email">
                  </div>
                  <div class="form-group">
                      <label for="password">كلمة السر</label>
                      <input type="password" class="form-control" name="password" value="same" id="password">
                  </div>
                  <div class="form-group">
                      <label for="exp">الخبرة</label>
                      <select name="exp" class="form-control" id="exp">
                          <option value="{{$employee->exp}}">{{$employee->exp}}</option>
                          <option value="مبتدئ">مبتدئ</option>
                          <option value="متوسط">متوسط</option>
                          <option value="متقدم">متقدم</option>
                          <option value="محترف">محترف</option>
                          <option value="خبير">خبير</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="cat_id">القسم</label>
                      <select name="cat_id" class="form-control" id="cat_id">
                          <option value="{{$employee->category->id}}">{{$employee->category->name}}</option>
                          @foreach(@App\Category::all() as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="phone">الهاتف</label>
                      <input type="text" class="form-control" value="{{$employee->phone}}" name="phone" id="phone">
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                  </div>
              </form>
          </div>
      @else

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
                                  <div class="w-100">
                                      <div class="form-group text-right">
                                          <label class="font-weight-bold" for="city">المدينة: </label>
                                          <select name="city" class="form-control py-0 w-100 " id="city">
                                              @foreach ($cities as $city)
                                                  <option value="{{ $city->name }}" {{ auth()->user()->customer->city == $city->name ? 'selected' : null }}>{{ $city->name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 mb-5">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">حفظ</button>
                      </div>
                  </form>
              </div>
          @endif
      </div>
    </div>
  </section>
@endsection
