@extends('templates/admin-template')
@section('title', 'View Products Data')

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
    
    <h1 class="h3 mb-2 text-gray-800">View Products Data</h1>
    <div class="card shadow mb-4">
      <a href="/admin/insert-product-form" class="btn btn-primary">Create Product</a>
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
                <th>Action</th>
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
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->qty }}</td>
                  <td>{{ $product->category->category_name }}</td>
                  <td>{{ $product->color->color_name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                    <a href="/admin/products/{{ $product->id }}/update-product-form" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/products/{{ $product->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
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
