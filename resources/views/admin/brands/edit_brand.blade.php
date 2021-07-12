@extends('admin/admin')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update brand
            </header>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_brand as $key => $edit_value)
                    <form role="form" method="post" action="{{URL::to('adminPage/updateBrand/'.$edit_value->brand_id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_name" class="form-control" id="brand" placeholder="Enter brand name">
                        </div>           
                        <button type="submit" name="edit_brand" class="btn btn-info">Update</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection