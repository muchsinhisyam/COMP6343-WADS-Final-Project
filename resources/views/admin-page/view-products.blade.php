@extends('templates/admin-template')
@section('title', 'Tables')
@section('content')
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Products Data</h1>
    <div class="card shadow mb-4">
      {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Category</th>
                <th>Color</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Category</th>
                <th>Color</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($info_s as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->product_name}}</td>
                <td>{{$info->price}}</td>
                <td>{{$info->qty}}</td>
                <td>{{$info->category}}</td>
                <td>{{$info->color}}</td>
                <td>{{$info->description}}</td>
                <td><a href="/admin/products/{{$info->id}}/update-products" class="btn btn-warning btn-sm">Edit</a></td> 
                <td><a href="/admin/products/{{$info->id}}/delete" class="btn btn-danger btn-sm">Delete</a></td> 
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
