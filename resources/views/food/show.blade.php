@extends('layouts.master')

@section('title')
    {{ $tutorial->title . ' | ' . $tutorial->category->name . ' | ' }}
@endsection

@section('content')
    @include('includes.header')

    <div class="container-fluid top15">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-striped">
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 individual-article nopadding">
                <div class="box-style">
                    <h3 class="tutorial-title">{{ $food->food_name }} | {{$tutorial->category->name}}</h3>
                    <hr>
                    <div>{!! $food->price !!}</div>
                    <div>{!! $food->image !!}</div>

                    <div class="clearfix"></div>
                    <br/>
                    <div>
                    </div>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection

