
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_food.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >Food Name</label>
                            <input class="form-control" name="food_name" type="text" placeholder="Title" required />
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >Price</label>
                            <input class="form-control" name="price" type="number" placeholder="Title" required />
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label " for="image" >Image</label>
                            <input class="form-control" type="file" name="image" id="fileToUpload">
                            <small>Only supports jpeg,jpg,png (max size 500KB)</small>
                        </div>
                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select name="category_id" class="form-control category_select" data-value="1">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
