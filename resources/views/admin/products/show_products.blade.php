@extends('admin/admin')
@section('admin_content')
<div>
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size:20px; font-weight:bold;">
      <p style="color:rgb(131, 131, 131)">
      Products
      </p>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select name="product_filter" type="dropdown-toggle" class="input-sm form-control w-sm inline v-middle">
          <option id="filter" data-cate="all" value="category">All</option>
          @foreach($filterCate as $filter)
            @if($filter->cate_id == $selectedCate)
              <option selected data-cate="{{$filter->cate_id}}" value="category">{{$filter->cate_name}}</option>
            @else
              <option data-cate="{{$filter->cate_id}}" value="category">{{$filter->cate_name}}</option>
            @endif
          @endforeach
        </select>
        <select name="product_filter" type="dropdown-toggle" class="input-sm form-control w-sm inline v-middle">
          <option data-brand="all" value="brand">All</option>
          @foreach($filterBrand as $filter)
            @if($filter->brand_id == $selectedBrand)
              <option selected data-brand="{{$filter->brand_id}}" value="brand">{{$filter->brand_name}}</option>
            @else
              <option data-brand="{{$filter->brand_id}}" value="brand">{{$filter->brand_name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <script>
        function updateQueryStringParameter(uri, key, value) {
          var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
          var separator = uri.indexOf('?') !== -1 ? "&" : "?";
          if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
          }
          else {
            return uri + separator + key + "=" + value;
          }
        }

        function removeURLParam(url, parameter) {
        //prefer to use l.search if you have a location/link object
        //window.alert(url);
          var urlparts = url.split('?');   
          
          if (urlparts.length >= 2) {

            var prefix = parameter + '=';
            var pars = urlparts[1].split(/[&;]/g);
            //reverse iteration as may be destructive
            //window.alert(pars);
            for (var i = pars.length; i-- > 0;) {    
                //idiom for string.startsWith
                //window.alert(pars[i]);
                if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                    pars.splice(i, 1);
                }
                
            }
            return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
          }
          return url;
        }

          $('select').on('change', function (e) {

            var link = window.location.href;
            var key = '';
            var value = '';
            if($('option:selected', this).val() == 'category'){
              key = 'filter%5Bproduct_cate%5D';
              value = $('option:selected', this).attr('data-cate');
              if($('option:selected', this).attr('data-cate') != 'all'){
                link = updateQueryStringParameter(link, key, value);
              }
              else { 
                //window.alert(link);
                link = removeURLParam(link, key);
              }
            }
            else{
              key = 'filter%5Bproduct_brand%5D';
              value = $('option:selected', this).attr('data-brand');
              if($('option:selected', this).attr('data-brand') != 'all'){
                link = updateQueryStringParameter(link, key, value);
              }
              else { 
                link = removeURLParam(link, key);
              }
            }
            //window.alert(link);
            location.href = link;
          }
        );
        </script>
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
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Status</th>
            <th>Image</th>
            <th>Voucher Enabled</th>
            <th>Voucher Qty</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
          <tr>
            <!--
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            -->
            <td>{{$product->product_name}}</td>
            <td>{{$product->cate_name}}</td>
            <td>{{$product->brand_name}}</td>
            <td>{{$product->product_price}}</td>
            <td><span class="text-ellipsis">  
            <?php
                if($product->product_status == 0){
            ?>
                <a class="btn btn-warning" style="width:60px;" href="{{URL::to('adminPage/unactive_product/'.$product->product_id)}}"><span>Hide</span></a>
            <?php
                }
                else{
            ?>
                <a class="btn btn-success" style="width:60px;" href="{{URL::to('adminPage/active_product/'.$product->product_id)}}"><span>Show</span></a>
            <?php
                }
            ?>
            </span>
          </td>
          <td>
            
            <embed type="{{$product->product_image_mime}}" src='data:{{$product->product_image_mime}};base64,{{base64_encode($product->product_image)}}' width="50" />
            
            </td>
            <td>
            <?php
                if($product->voucher_enabled == 0){
            ?>
                <a class="btn btn-success" style="width:70px;" href="{{URL::to('adminPage/active_voucher/'.$product->product_id)}}"><span>Enable</span></a>
            <?php
                }
                else{
            ?>
                <a class="btn btn-outline-success" style="width:70px;" href="{{URL::to('adminPage/unactive_voucher/'.$product->product_id)}}"><span>Enabled</span></a>
            <?php
                }
            ?>
            </td>
            <td>{{$product->voucher_quantity}}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 15px;">
                      @can('edit product')
                        <a class="btn btn-primary" href="{{URL::to('adminPage/editProduct/'.$product->product_id)}}" class="active" ui-toggle-class="">Edit</a>
                      @endcan
                      </div>
                    <div>
                      @can('edit product')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{URL::to('adminPage/deleteProduct/'.$product->product_id)}}" class="active" ui-toggle-class="">Delete</i></a>
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
          <div aria-label="Page navigation">        
          {{ $products->links('vendor.pagination.bootstrap-4') }}
          </div>    
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection