@extends('layouts.adminPages')
@section('content')
<div class="x_content">
                      <div class="row">
   @if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger">
	{{session('danger')}}
</div>
@endif
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Published</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($testimonials as $testi)
                        <tr>
                          <td>{{$testi->name}}</td>
                          <td>{{$testi->position}}</td>
                          <td>@if($testi->published)
                               yes
                               @else
                                 No
                             @endif</td>
                          <td><a href="updateTestimonial/{{ $testi->id }}"><img src="{{asset('assets/admin/./images/edit.png')}}" alt="Edit"></a></td>
                          <td><a href="deleteTestimonial/{{ $testi->id }}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assets/admin/./images/delete.png')}}" alt="Delete"></a></td>
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
Manage Testimonials
@endsection
@section('title')
List of Testimonial
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