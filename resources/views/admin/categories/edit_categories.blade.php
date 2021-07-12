@extends('admin/admin')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update category
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" method="post" action="{{URL::to('adminPage/updateCategory/'.$edit_category->cate_id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" value="{{$edit_category->cate_name}}" name="category_name" class="form-control" id="category" placeholder="Enter category name">
                        </div>           
                        <button type="submit" name="edit_categories" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection