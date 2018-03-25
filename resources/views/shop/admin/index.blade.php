@extends('layouts.shop')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <hr/>
                <h2>Upload product</h2>
                <hr/>
                <p class="text-warning">{{$msg ?? ""}}</p>
                <form enctype="multipart/form-data" class="form form-vertical" action="/shop/admin" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="desc">Name</label><br>
                        <input type="text" class="form-control" name="name" placeholder="product name" id="name" required><br>
                    </div>
                    <div class="form-group">
                        <label for="desc">Image Description</label><br>
                        <input type="text" class="form-control" name="description" placeholder="description" id="desc" required><br>
                    </div>
                    <div class="form-group">
                        <label for="old">Old price</label><br>
                        <input type="text" class="form-control" name="old_price" placeholder="old price" id="old" required><br>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label><br>
                        <input type="text" class="form-control" name="qty" placeholder="qty" id="old" required/><br>
                    </div>
                    <div class="form-group">
                        <label for="new">new price</label><br>
                        <input type="text" class="form-control" name="new_price" placeholder="new price" id="new" required><br>
                    </div>
                    <div class="form-group">
                        <label for="img">Upload image<b style='color: red;'> (Image should be of size 700 X 700)</b></label><br>
                        <input type="file" name="upload" placeholder="image" id="img"/><br>
                    </div>
                    <div class="form-group">
                        <label for="cat">category</label><br>
                        <input type="radio" name="category" value="men" id="cat" selected />Men<br>
                        <input type="radio" name="category" value="women" id="cat"/>Women<br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="upload image"/>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection