
@foreach($foods as $key => $food)
    <div class="col-xs-12 col-sm-6 col-md-3 cust-md-3 {{ $key%2==0?"border-top-green":"border-top-red" }} wow fadeInLeftn bg-light_gray" data-wow-duration="1s" data-wow-delay="0.3s">
        <article class="post home-news-box news-box-height">
            <div class="entry-header">
                <div class="post-thumb thumb">
                    <img src="{{ asset('uploads/food/image/'.$food['image']) }}" alt="" class="img-responsive img-fullwidth" style="height: 250px;object-fit: cover;">
                </div>
            </div>
            <div class="entry-content">
                <div class="entry-meta media no-bg no-border">
                    <div class="media-body">
                        <div class="event-content pull-left flip pb-10">
                            <h5 class="entry-title text-white">
                                <a href="#">{{($food->food_name)}}</a>
                            </h5>
                            <i class="fa fa-calendar"></i> <span class="font-13">{{$food->price}}</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>
    </div>


@endforeach
