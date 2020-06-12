@extends('templates/admin-template')
@section('title', 'Update User\'s Info')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Update User's Info</h1>
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
        <form action="/admin/users-info/{{$selected_users_info->id}}/update" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input id="first_name" type="name" class="form-control" name="first_name"  placeholder="First Name" value="{{$selected_users_info->first_name}}" required/>
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input id="last_name" type="name" class="form-control" name="last_name"  placeholder="Last Name" value="{{$selected_users_info->last_name}}" required/>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email"  placeholder="Email" value="{{$selected_users_info->email}}" required/>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input id="phone" type="phone" class="form-control" name="phone"  placeholder="Phone" value="{{$selected_users_info->phone}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control" id="city" name="city" required>]
                <option @if($selected_users_info->city=="Bali") selected @endif>Bali</option>
                <option @if($selected_users_info->city=="Bekasi") selected @endif>Bekasi</option>
                <option @if($selected_users_info->city=="Bogor") selected @endif>Bogor</option>
                <option @if($selected_users_info->city=="Depok") selected @endif>Depok</option>
                <option @if($selected_users_info->city=="Jakarta") selected @endif>Jakarta</option>
                <option @if($selected_users_info->city=="Tanggerang") selected @endif>Tanggerang</option>
              </select>
            </div>
            <div class="form-group">
              <label for="zip_code">Zip Code</label>
              <input id="zip_code" type="number" class="form-control" name="zip_code"  placeholder="Zip Code" value="{{$selected_users_info->zip_code}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" class="form-control" id="address" name="address" cols="15" rows="10" placeholder="Address">{{ $selected_users_info->address }}</textarea>
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
