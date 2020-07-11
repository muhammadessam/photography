@extends('admin.layout.layout')
@section('content')


    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong> ارسال الرد الي: </strong>
                <p>{{$contact->email}}</p>
            </div>
            <div class="card-body">
                <form action="{{route('admin.sendReply', $contact)}}" method="post">
                    @csrf
                    <div class="from-group">
                        <label for="msg">الرد</label>
                        <textarea class="form-control" name="msg" id="msg" cols="30" rows="10"></textarea>
                        <x-error f="msg"></x-error>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
