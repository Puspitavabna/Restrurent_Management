
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_food.create') }}">Create Food</a>

                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foods </th>
                                <th>Category_name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($foods as $key => $food)

                        <tr>
                            <td>{{ $food->id }}</td>
                            <td>{{ $food->food_name}}</td>
                            <td>{{ $food->category->name}}</td>
                            <td>{{ $food->price}}</td>
                            <td width="5%">
                                <a href="{{ route('admin_food.edit', $food->id) }}" target="_blank" class="btn-sm btn-warning">Edit</a>
                              <form method="POST" action="{{ route('admin_food.destroy', $food->id) }}">
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
