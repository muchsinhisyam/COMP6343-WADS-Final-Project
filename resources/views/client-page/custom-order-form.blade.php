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

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="first_name" value="" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" value="" placeholder="Last Name" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="company" placeholder="Company Name" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="w-100" id="country">
                                    <option value="usa">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="ger">Germany</option>
                                    <option value="fra">France</option>
                                    <option value="ind">India</option>
                                    <option value="aus">Australia</option>
                                    <option value="bra">Brazil</option>
                                    <option value="cana">Canada</option>
                                </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="street_address" placeholder="Address" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="city" placeholder="Town" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                </div>
                                <div class="custom-file col-12 mb-3">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <a href="#" class="btn amado-btn w-100">Proceed Custom Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection