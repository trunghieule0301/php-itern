@extends('admin/admin')
@section('admin_content')
<div>
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size:20px; font-weight:bold;">
      <p style="color:rgb(131, 131, 131)">
      Products image
      </p>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select name="product_filter" type="dropdown-toggle" style="width:250px" class="input-sm form-control w-sm inline v-middle">
          <option id="filter" data-product="all" value="product">All</option>
          @foreach($filterProduct as $filter)
            @if($filter->product_slug == $selectedProduct)
              <option selected data-product="{{$filter->product_slug}}" value="product">{{$filter->product_name}}</option>
            @else
              <option data-product="{{$filter->product_slug}}" value="product">{{$filter->product_name}}</option>
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

        function removeURLParameter(url, parameter) {
        //prefer to use l.search if you have a location/link object
          var urlparts = url.split('?');   
          if (urlparts.length >= 2) {

            var prefix = encodeURIComponent(parameter) + '=';
            var pars = urlparts[1].split(/[&;]/g);

            //reverse iteration as may be destructive
            for (var i = pars.length; i-- > 0;) {    
                //idiom for string.startsWith
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
            if($('option:selected', this).val() == 'product'){
              key = 'product';
              value = $('option:selected', this).attr('data-product');
              if($('option:selected', this).attr('data-product') != 'all'){
                link = updateQueryStringParameter(link, key, value);
              }
              else { 
                link = removeURLParameter(link, key);
              }
            }
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
            <th>Product</th>
            <th>Image</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
          <tr>
            <!--
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            -->
            <td>{{$image->product_name}}</td>
            <td>
            
            <embed type="{{$image->image_mime}}" src='data:{{$image->image_mime}};base64,{{base64_encode($image->image_data)}}' width="50" />
            
            </td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 15px;">
                      @can('edit product')
                        <a class="btn btn-primary" href="{{URL::to('adminPage/editProductImage/'.$image->image_id)}}" class="active" ui-toggle-class="">Edit</a>
                      @endcan
                      </div>
                    <div>
                      @can('edit product')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{URL::to('adminPage/deleteProductImage/'.$image->image_id)}}" class="active" ui-toggle-class="">Delete</a>
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
          {{ $images->links('vendor.pagination.bootstrap-4') }}
          </div>    
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection