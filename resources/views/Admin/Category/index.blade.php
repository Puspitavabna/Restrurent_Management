
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_category.create') }}">Create category</a>

                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>categorys </th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($categories as $key => $category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name}}</td>
                            <td>{{ $category->category_image}}</td>
                            <td width="5%">
                                <a href="{{ route('admin_category.edit', $category->id) }}" target="_blank" class="btn-sm btn-warning">Edit</a>
                              <form method="POST" action="{{ route('admin_category.destroy', $category->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" value="Delete" class="btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
