@extends('admin/admin')
@section('admin_content')
<div>
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size:20px; font-weight:bold;">
      <p style="color:rgb(131, 131, 131)">
      Brands
      </p>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                  
      </div>
      <div class="col-sm-4">
        <?php 
        $inform = Session::get('inform');
        if($inform){
            echo '<span class="text-alert">' .$inform .'</span>';
            Session::put('inform', null);
        }
        ?>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          
          
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!--
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
          -->
            <th>Name</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
          <tr>
            <!--
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            -->
            <td>{{$brand->brand_name}}</td>
            <td><span class="text-ellipsis">  
            <?php
                if($brand->brand_status == 0){
            ?>
                <a class="btn btn-warning" style="width:60px;" href="{{URL::to('adminPage/unactive_brand/'.$brand->brand_id)}}"><span>Hide</span></a>
            <?php
                }
                else{
            ?>
                <a class="btn btn-success" style="width:60px;" href="{{URL::to('adminPage/active_brand/'.$brand->brand_id)}}"><span>Show</span></a>
            <?php
                }
            ?>
            </span></td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 15px;">
                      @can('edit product')
                        <a class="btn btn-primary" href="{{URL::to('adminPage/editBrand/'.$brand->brand_id)}}" class="active" ui-toggle-class="">Edit</a>
                      @endcan
                      </div>
                    <div>
                      @can('edit product')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{URL::to('adminPage/deleteBrand/'.$brand->brand_id)}}" class="active" ui-toggle-class="">Delete</a>
                      @endcan
                      </div>
                </div>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row" style="margin-top:5px; margin-bottom:5px;">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $brands->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection