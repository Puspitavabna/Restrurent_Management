

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <div class="float-right"><a class="btn btn-success" target="_blank" href="{{ route('admin_food.show', $food->id) }}">View</a></div>
                    <div class="clearfix"></div>
                    <form method="post" action="{{ route('admin_food.update', $food->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Title</label>
                            <input class="form-control" name="food_name" type="text"  value="{{$food->food_name}}" />
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Price</label>
                            <input class="form-control" name="price" type="number"  value="{{$food->price}}" />
                        </div>
                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}" {{ $food->category_id == $category->id ? 'selected'  : '' }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                        </div>
                        <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>