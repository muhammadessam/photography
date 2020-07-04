@extends('site.layouts.base')

@section('content')
<section class="my-5 register">
    <div class="container">
      <div class="my-shadow py-4">
        <div class="dif">
          <h4 class="text-center font-weight-bold">الدخول</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
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
                    <form method="POST" action="{{ route('login') }}">
                      <div class="row m-0 p-0">
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإيميل:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الرقم السرى:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password" class="form-control" required></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">دخول</button>
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
