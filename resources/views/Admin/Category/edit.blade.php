

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <div class="float-right"><a class="btn btn-success" target="_blank" href="{{ route('admin_category.show', $category->id) }}">View</a></div>
                    <div class="clearfix"></div>
                    <form method="post" action="{{ route('admin_category.update', $category->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Title</label>
                            <input class="form-control" name="category_name" type="text"  value="{{$category->name}}" />
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