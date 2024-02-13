@extends('layouts.adminPages')
@section('content')
<div class="x_content">

          <div class="row">
              <div class="col-sm-12">
              @if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif
                <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Registration Date</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Active</th>
              <th>Edit</th>
            </tr>
          </thead>


          <tbody>
            @foreach($user as $user)
            <tr>
              <td>{{$user->created_at->format('d M Y')}}</td>
              <td>{{$user->fullName}}</td>
              <td>{{$user->userName}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user['active']?'Yes':'No'}}</td>
              <td><a href="updateUser/{{ $user->id }}"><img src="{{asset('assets/admin/./images/edit.png')}}" alt="Edit"></a></td>
            </tr>
        
            @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
    </div>
  </div>
</div>
</div>
</div>
        <!-- /page content -->
@endsection
@section('type')
Manage Users
@endsection
@section('title')
List of User
@endsection
@section('js')
<!-- Datatables -->
    
<link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('jsfooter')
<!-- Datatables -->
<script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endsection