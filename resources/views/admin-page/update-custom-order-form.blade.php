@extends('templates/admin-template')
@section('title', 'Update Order Status')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Update Order Status</h1>
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
        <form action="/admin/view-custom-orders/{{$selected_order->id}}/update" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Update Status</label>
                    <select class="form-control" name="order_status" id="exampleFormControlSelect1">
                        <option @if($selected_order->order_status=="Waiting for Approval") selected @endif>Waiting for Approval</option>
                        <option @if($selected_order->order_status=="Waiting for Payment") selected @endif>Waiting for Payment</option>
                        <option @if($selected_order->order_status=="Payment on Verification") selected @endif>Payment on Verification</option>
                        <option @if($selected_order->order_status=="Order on Process") selected @endif>Order on Process</option>
                        <option @if($selected_order->order_status=="On Delivery") selected @endif>On Delivery</option>
                        <option @if($selected_order->order_status=="Order Done") selected @endif>Order Done</option>
                    </select>
                </label>
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
