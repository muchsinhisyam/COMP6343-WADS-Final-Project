@extends('templates/client-template')
@section('title', 'Pay Form')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Custom Order Form</h2>
                        </div>

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
                        
                        <form action="/pay/{{ $selected_order->id }}"  method="Post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h6>Order ID</h6>
                                    <input type="text" class="form-control" value="{{ $selected_order->id }}" readonly>
                                </div>
                                <div class="custom-file col-12 mb-3">
                                    <h6>Upload Transfer Evidence</h6>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file[]" accept="image/jpg, image/jpeg, image/png" multiple required>
                                        <label class="custom-file-label" for="file">Choose Photo (.jpg/.jpeg/.png)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-summary">
                                <button type="submit" class="btn amado-btn w-50">Proceed Custom Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection