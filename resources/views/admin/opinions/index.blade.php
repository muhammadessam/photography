@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <h3 class="col-12 text-center">رأي العملاء</h3>
        @foreach(@App\Opinion::all() as $op)
            <div class="card">
                <div class="card-header">
                    من
                    {{$op->customer->user->name}}
                    <form class="float-left" action="{{route('admin.opinions.destroy',$op)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        @if($op->statue == "pending")
                        <a class="btn btn-success" href="{{route('admin.opinion_accept',$op)}}"><i class="fa fa-check"></i></a>
                        <a class="btn btn-warning" href="{{route('admin.opinion_refuse',$op)}}"><i class="fa fa-times"></i></a>
                        @endif
                    </form>
                </div>
                <div class="card-body">
                    {{$op->body}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
