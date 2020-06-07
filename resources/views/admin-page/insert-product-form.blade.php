@extends('templates/admin-template')
@section('title', 'Create Product')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Create Product</h1>
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
        <form action="/admin/insert-products" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="form-group">
              <label for="product_name">Name</label>
              <input id="text" type="product_name" class="form-control" name="product_name"  placeholder="Product's Name" required/>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input id="price "type="number" class="form-control" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Product's Price" required/>
            </div>
            <div class="form-group">
              <label for="qty">Stock</label>
              <input id="qty"type="number" class="form-control" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Product's Qty" required/>
            </div>
            <div class="form-group">
              <label for="category_id">Category</label>
              <select class="form-control" id="category_id" name="category_id" required>
                <!-- <option>None selected</option> -->
                @foreach($categories as $category)
                  <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="color_id">Color</label>
              <select class="form-control" id="color_id" name="color_id" required>
                <!-- <option>None selected</option> -->
                @foreach($colors as $color)
                  <option value="{{$color->id}}" selected>{{$color->color_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name=description rows="3" placeholder="Product's Description" required></textarea>
            </div>
            <div class="form-group">
              <label for="description">Photo</label>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file[]" accept="image/jpg, image/jpeg, image/png" multiple required>
                  <label class="custom-file-label" for="file">Choose Photo (.jpg/.jpeg/.png)</label>
                </div>
              </div>
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
