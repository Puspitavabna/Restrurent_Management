
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_category.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >category Name</label>
                            <input class="form-control" name="name" type="text" placeholder="name" required />
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label " for="image" >Image</label>
                            <input class="form-control" type="file" name="category_image" id="fileToUpload">
                            <small>Only supports jpeg,jpg,png (max size 500KB)</small>
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
