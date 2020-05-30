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

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="first_name" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="w-100" id="city">
                                        <option value="Bali">Bali</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="East Jakarta">East Jakarta</option>
                                        <option value="West Jakarta">West Jakarta</option>
                                        <option value="North Jakarta">North Jakarta</option>
                                        <option value="South Jakarta">South Jakarta</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="address" placeholder="Address">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="city" placeholder="Town" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="zip_code" placeholder="Zip Code">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="phone" placeholder="Phone No">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="address" class="form-control w-100" id="address" cols="15" rows="10" placeholder="Address"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <a href="#" class="btn amado-btn w-100">Update User's Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection