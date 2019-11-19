@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Welcome to Resstrurent Management</h1>
        </div>
    </div>
</div>
<div class="container">
    <h2 class="text-center top30 bottom10">Restrurent Food</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                @foreach($foods as $key => $food)
                    <div class="col-md-6 nopadding">
                        <div class="box-style">
                            <a href="{{ $food->tutorial_url }}" class="custom-card">
                                <h4 class="tutorial-title">{{ $key + 1 }}. {{$food->food_name}}</h4>
                            </a>

                            <hr>
                            <div class="float-left">
                                <span class="btn-xs btn-info"><i class="fa fa-tags"></i> {{$food->category->name}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-2">
            @include('includes/google_ad')
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <?php $category = [] ?>
            @foreach($quiz_topics as $quiz_topic)
                @if(!in_array($quiz_topic->category->name, $category))
                    <br/>
                    <h3>{{ $quiz_topic->category->name }}</h3>
                @endif
                <div><a href="{{ route('quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}">{{$quiz_topic->topic_name}}</a></div>
                <?php array_push($category, $quiz_topic->category->name); ?>
            @endforeach
        </div>
    </div>

    <div>
        {!! $tutorials->render() !!}
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
