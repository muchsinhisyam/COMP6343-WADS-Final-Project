@extends('templates/admin-template')
@section('title', 'Create Product')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Update Status</h1>
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
        <form action="/admin/view-custom-orders/{{$info->id}}/update" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Update Status</label>
                    <select class="form-control" name="order_status" id="exampleFormControlSelect1">
                        <option @if($info->order_status=="Waiting for approval") selected @endif>Waiting for approval</option>
                        <option @if($info->order_status=="Order on process") selected @endif>Order on process</option>
                        <option @if($info->order_status=="On delivery") selected @endif>On delivery</option>
                        <option @if($info->order_status=="Order done") selected @endif>Order done</option>
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
