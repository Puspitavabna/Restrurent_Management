@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="alert alert-info">
            <center>Welcome to Restrurent Management Section</center>
        </div>
    </div>
    <li class="nav">
        <a href="{{ route('user.sign_in') }}"><i class="fa fa-laptop"></i>Login</a>
    </li>
    <li  class="nav">
        <a href="{{ route('user.sign_up') }}"><i class="fa fa-pie-chart"></i>Sign up</a>
    </li>
    <div class="container">
        <h2 class="text-center top30 bottom10">Restrurent Food</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach($categories as $key => $category)
                        <div class="card-body">
                            <a href="{{ route('food.category', $category->category_slug) }}">{{$category->name}}</a>
                        </div>
                    @endforeach
                    {{--@foreach($foods as $key => $food)--}}
                        {{--<div class="col-md-6 nopadding">--}}
                            {{--<div class="box-style">--}}
                                {{--<a href="{{ $food->food_url }}" class="custom-card">--}}
                                    {{--<h4 class="tutorial-title">{{ $key + 1 }}. {{$food->food_name}}</h4>--}}
                                {{--</a>--}}

                                {{--<hr>--}}
                                {{--<div class="float-left">--}}
                                    {{--<a href="" ><span class="btn-xs btn-info"><i class="fa fa-tags"></i> {{$food->category->name}}</span></a>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div>
        </div>
        {{--<div class="pagination">--}}
        {{--<a href = "#">&laquo;</a>--}}
        {{--<a href = "#">1</a>--}}
        {{--<a href = "#" class="active">2</a>--}}
        {{--<a href = "#">3</a>--}}
        {{--<a href = "#">4</a>--}}
        {{--<a href = "#">5</a>--}}
        {{--<a href = "#">6</a>--}}
        {{--<a href = "#">&raquo;</a>--}}
        {{--</div>--}}
    </div>
@endsection
