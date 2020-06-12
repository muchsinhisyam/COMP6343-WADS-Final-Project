@extends('templates/admin-template')
@section('title', 'View Custom Orders')

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

    <h1 class="h3 mb-2 text-gray-800">View Custom Orders</P></h1>
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
                <th>Customer Name</th>
                <th>Description</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Description</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($custom_orders as $custom_order)
                <tr>
                  <td> {{ $custom_order->id }} </td>
                  <td> {{ $custom_order->user->name }} </td>
                  <td> {{ $custom_order->description }} </td>
                  <td> {{ $custom_order->order_status }} </td>
                  <td>
                    <a href="/admin/view-custom-orders/{{ $custom_order->id }}/edit" class="btn btn-success btn-sm">Update Status</a>
                    <a href="/admin/view-custom-orders/{{ $custom_order->id }}/download" class="btn btn-warning btn-sm">Download Photos</a>
                    @if ($custom_order->order_status != 'Waiting for Payment' && $custom_order->order_status != 'Waiting for Approval')
                      <a href="/admin/view-custom-orders/{{ $custom_order->id }}/download-payment" class="btn btn-primary btn-sm">Download Payment Photo</a>
                    @endif
                    <a href="/admin/view-custom-orders/{{ $custom_order->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
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
