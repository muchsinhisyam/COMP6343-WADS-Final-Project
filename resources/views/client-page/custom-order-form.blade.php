@extends('templates/client-template')
@section('title', 'Checkout')

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
                        
                        <form action="/custom-order"  method="Post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $customer_info->first_name  }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $customer_info->last_name }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone no" value="0{{ $customer_info->phone }}"required>
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="description" class="form-control w-100" id="description" cols="30" rows="10" placeholder="Leave a comment about your custom order"></textarea>
                                </div>
                                <div class="custom-file col-12 mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file[]" accept="image/jpg, image/jpeg, image/png" multiple>
                                        <label class="custom-file-label" for="file">Choose Photo (.jpg/.jpeg/.png)</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-lg-4"> -->
                                <div class="cart-summary">
                                    <button type="submit" class="btn amado-btn w-50">Proceed Custom Order</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection