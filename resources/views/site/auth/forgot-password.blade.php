@extends('site.layouts.base')

@section('content')
<section class="my-5 register">
    <div class="container pt-5">
      <div class="my-shadow py-4 mx-auto mt-5" style="max-width: 500px" >
        <div class="dif">
          <h4 class="text-center font-weight-bold">استعادة كلمة المرور</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>

        <div class="  main-login">
          <div class="  login-cont">
            <div class=" login-div login-div2">
              <div class="">
                <div class=" content-log">
                  <div class="mt-4">
                    <div class="row m-0 p-0">
                      <div class="col-12" >
                        @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
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
                    <form method="POST" action="{{ route('password.email') }}" >
                      <div class="row m-0 p-0">
                        <div class="form-group col-md-12 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإيميل:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" required></div>
                          </div>
                        </div>
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
