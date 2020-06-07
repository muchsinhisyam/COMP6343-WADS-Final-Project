@extends('templates/admin-template')
@section('title', 'View Stock Order Details')

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

    <h1 class="h3 mb-2 text-gray-800">View Stock Order Details</P></h1>
    <div class="card shadow mb-4">
      {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($stock_order_details as $stock_order_detail)
                <tr>
                  <td> {{ $stock_order_detail->order->id }} </td>
                  <td> {{ $stock_order_detail->order->user->name }} </td>
                  <td> {{ $stock_order_detail->product->product_name }} </td>
                  <td> {{ $stock_order_detail->qty }} </td>
                  <td>
                    <a href="/admin/view-stock-order-details/{{ $stock_order_detail->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
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
