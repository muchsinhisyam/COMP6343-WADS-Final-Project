@extends('templates/client-template')
@section('title', 'Checkout')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>User's Info</h2>
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

                        <form action="/customer-info" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $customer_info->first_name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $customer_info->last_name }}"  required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $customer_info->email }}"  required>
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="w-100" id="city" name="city">
                                        <option @if($customer_info->city=="Bali") selected @endif>Bali</option>
                                        <option @if($customer_info->city=="Bekasi") selected @endif>Bekasi</option>
                                        <option @if($customer_info->city=="Bogor") selected @endif>Bogor</option>
                                        <option @if($customer_info->city=="Depok") selected @endif>Depok</option>
                                        <option @if($customer_info->city=="Jakarta") selected @endif>Jakarta</option>
                                        <option @if($customer_info->city=="Tanggerang") selected @endif>Tanggerang</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code" value="{{ $customer_info->zip_code}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone No" value="0{{ $customer_info->phone}}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="address" class="form-control w-100" id="address" name="address" cols="15" rows="10" placeholder="Address">{{ $customer_info->address }}</textarea>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-lg-4"> -->
                                <div class="cart-summary">
                                    <button type="submit" class="btn amado-btn w-50">Update User's Info</button>
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