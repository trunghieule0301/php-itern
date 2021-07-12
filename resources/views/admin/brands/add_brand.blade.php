@extends('admin/admin')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="font-size:20px; font-weight:bold;">
                <p style="color:rgb(131, 131, 131)">
                Add brand
                </p>
            </header>
            <div class="panel-body">
                <?php 
        $inform = Session::get('inform');
        if($inform){
            echo '<span class="text-alert">' .$inform .'</span>';
            Session::put('inform', null);
        }
        ?>
                <div class="position-center">
                    <form role="form" method="post" action="{{URL::to('adminPage/saveBrand')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="brand">Brand name</label>
                            <input type="text" name="brand_name" class="form-control" id="brand" placeholder="Enter brand name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="brand_status" class="form-control input-sm m-bot15">
                                <option value="0">Hide</option>
                                <option value="1">Show</option>
                            </select>
                        </div>           
                        <button type="submit" name="add_brand" class="btn btn-info">Add</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection