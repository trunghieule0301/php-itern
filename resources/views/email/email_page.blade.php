@extends('admin/admin')
@section('admin_content')
<div>
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size:20px; font-weight:bold;">
      <p style="color:rgb(131, 131, 131)">
      Emails
      </p>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                  <a class="btn btn-success" href="{{URL::to('adminPage/send_email')}}">Send email to all users</a>       
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
            <th>Index</th>
            <th>To user</th>
            <th>To email</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($emails as $key => $email)
          <tr>
            <!--
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            -->
            <td>{{$key + 1}}</td>
            <td>{{$email->toUser}}</td>
            <td>{{$email->email}}</td>
            <td>{{$email->status}}</td>
            <td>
                <div style="display: flex; align-items: center;">
                    <div>
                      @can('edit product')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{URL::to('adminPage/delete_email/'.$email->id)}}" class="active" ui-toggle-class="">Delete</a>
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
          {{ $emails->links('vendor.pagination.bootstrap-4') }}
          </div>              
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection