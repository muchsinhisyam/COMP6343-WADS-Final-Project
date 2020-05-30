@extends('templates/admin-template')
@section('title', 'Create Product')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Update User</h1>
    <div class="card shadow mb-4">
      {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div> --}}
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
      
      <div class="card-body">
        <form action="/admin/users/{{$selected_user->id}}/update" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="form-group">
              <label for="name">Name</label>
              <input id="text" type="name" class="form-control" name="name"  placeholder="User's Name" value="{{$selected_user->name}}" required/>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email"  placeholder="User's Email" value="{{$selected_user->email}}" required/>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control" name="password"  placeholder="User's Password"  value="{{$selected_user->password}}" disabled/>
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" id="role" name="role" required>]
                <option  @if($selected_user->role=="Customer") selected @endif>Customer</option>
                <option  @if($selected_user->role=="Admin") selected @endif>Admin</option>
              </select>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
