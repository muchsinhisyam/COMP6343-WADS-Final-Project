@extends('templates/admin-template')
@section('title', 'View User Infos')

@section('content')
    @if(session('success'))
      <div class="alert alert-success" role="alert">
          {{session('success')}}
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <h1 class="h3 mb-2 text-gray-800">View Users</P></h1>
    <div class="card shadow mb-4">
      {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($users_info as $user_info)
                <tr>
                  <td>{{ $user_info->user->id }}</td>
                  <td>{{ $user_info->first_name }}</td>
                  <td>{{ $user_info->last_name }}</td>
                  <td>{{ $user_info->email }}</td>
                  <td>{{ $user_info->phone }}</td>
                  <td>{{ $user_info->city }}</td>
                  <td>{{ $user_info->zip_code }}</td>
                  <td>{{ $user_info->address }}</td>
                  <td>
                    <a href="/admin/users-info/{{$user_info->id}}/update-form" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/users-info/{{$user_info->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </td> 
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

<!-- Page level plugins-->
<!-- <script src="{{ asset('/assets/admin-page/vendor/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin-page/vendor/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script> -->

<!-- Page level custom scripts-->
<!-- <script src="{{ asset('assets/admin-page/js/demo/datatables-demo.js') }}"></script> -->
