<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
use App\Product;
use App\CustomerInfo;
use App\Cart;
use App\CartDetail;
use App\TransferPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use ZipArchive;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class OrderController extends Controller
{
    private $order_type = "Stock Order";

    public function view_orders($id)
    {
        $orders = Order::where('user_id', '=', $id)->get();
        return view('client-page/orders', compact('orders'));
    }

    public function view_checkout($id)
    {   
        $cart = Cart::select('id')->where('user_id', '=', $id)->first();
        $cartDetails = CartDetail::where('cart_id', '=', $cart->id)->get();

        // if($this->checkIfProductChosenExceedsStock($cartDetails)) {
        //     $user = User::find($id);
        //     $customer_info = $user->customer;
        //     return view('client-page/checkout', compact('customer_info'));
        // } 
        // else {
        //     $message = 'Oops! The stock is limited.';
        //     return Redirect::back()->with('success', 'Oops! The stock is limited.');;
        // }

        foreach($cartDetails as $cartDetail) {
            $selectedProduct = Product::select('product_name', 'qty')->where('id', '=', $cartDetail->product_id)->first();
            if($cartDetail->qty > $selectedProduct->qty){
                $message = 'Oops! The stock is limited. There are '.$selectedProduct->qty.' '.$selectedProduct->product_name.' left.';
                return Redirect::back()->with('success', $message);
            }
        }
        $user = User::find($id);
        $customer_info = $user->customer;
        return view('client-page/checkout', compact('customer_info'));
    }

    public function checkIfProductChosenExceedsStock($cartDetails) {
        foreach($cartDetails as $cartDetail) {
            $selectedProduct = Product::select('qty')->where('id', '=', $cartDetail->product_id)->first();
            if($cartDetail->qty > $selectedProduct->qty){
                return false;
            }
        }
        return true;
    }

    public function createTransaction(Request $request)
    {
        $user_id = Auth::user()->id;

        $validatedData  =  $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(08)[0-9]{8}/|max:14',
            'zip_code' => 'required|max:5',
            'address' => 'required|max:255'
        ]);

        CustomerInfo::where('user_id', $user_id)->update(
            array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'address' => $request->address
            )
        );

        $newOrder = new Order;
        $newOrder->user_id = $user_id;
        $newOrder->order_type = $this->order_type;
        $newOrder->order_status = Order::defaultStockOrderStatus;
        $newOrder->save();

        $this->truncateAndDuplicateCartTable($newOrder);

        return redirect('/orders/' . $user_id)->with('success', 'Your order is successfully added');
    }

    public function truncateAndDuplicateCartTable($newOrder)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::select('id')->where('user_id', '=', $user_id)->first();
        $cartDetails = CartDetail::where('cart_id', '=', $cart->id)->get();

        foreach ($cartDetails as $cartDetail) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $newOrder->id;
            $order_detail->product_id = $cartDetail->product_id;
            $order_detail->qty = $cartDetail->qty;
            $product = Product::where('id', $cartDetail->product_id)->update(
                array(
                    'qty' => $cartDetail->product->qty - $order_detail->qty
                )
            );
            $order_detail->save();

            $cartDetail->delete();
        }
    }

    public function delete_order($id)
    {
        $selected_order = Order::find($id);
        $selected_order->delete($selected_order);
        return redirect('/orders/' . Auth::user()->id)->with('success', 'Order successfully deleted or canceled');
    }

    public function view_order_details($id)
    {
        $selected_order = Order::find($id);
        $selected_order_details = OrderDetail::where('order_id', '=', $selected_order->id)->get();

        $subTotal = 0;

        foreach ($selected_order_details as $detail) {
            $selectedProductPrice = $detail->qty * $detail->product->price;
            $subTotal = $selectedProductPrice + $subTotal;
        }

        return view('client-page/order-details', compact('selected_order_details', 'subTotal'));
    }

    public function view_pay($id)
    {
        $selected_order = Order::find($id);
        return view('client-page/pay-form', compact('selected_order'));
    }

    public function view_invoice($id) 
    {   
        $userId = Auth::user()->id;
        $customerInfo = CustomerInfo::where('user_id', '=', $userId)->first();

        // $order = Order::select('id')->where('user_id', '=', $id)->first();
        $orderDate = Order::select('created_at')->where('id', '=', $id)->first();
        $orderDetails = OrderDetail::where('order_id', '=', $id)->get();

        $owner = new Party([
            'custom_fields' => [
                'Company Name'          => 'Customniture',
                'phone'         => '(021) 786-5108',
                'address' => 'Jalan Menteng Raya No. 5'
            ],
        ]);

        $customer = new Party([
            'custom_fields' =>[
                'User ID' => $customerInfo->user_id,
                'First Name' => $customerInfo->first_name,
                'Last Name' =>  $customerInfo->last_name,
                'Email Address'=> $customerInfo->email,
                'Telp No' =>  $customerInfo->phone,
                'City' => $customerInfo->city,
                'Zip Code' => $customerInfo->zip_code,
                'Address' => $customerInfo->address
            ],
        ]);

        $items = [];

        foreach($orderDetails as $orderDetail) {
            $selectedProduct = Product::where('id', '=', $orderDetail->product_id)->first();
            $item = (new InvoiceItem())->title($selectedProduct->product_name)->pricePerUnit($selectedProduct->price)->quantity($orderDetail->qty);
            array_push($items, $item);
        }

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make('receipt')
            ->serialNumberFormat($id)
            ->seller($owner)
            ->buyer($customer)
            ->date($orderDate->created_at)
            ->dateFormat('d/m/Y')
            ->currencySymbol('IDR')
            ->filename($customerInfo->first_name . 'OrderNo.' . $id)
            ->addItems($items)
            ->logo(public_path('vendor/invoices/logo.png'));

        return $invoice->stream();
    }

    public function insertTransactionPhotos($id, Request $request)
    {
        $iteration = 1;
        foreach ($request->file as $file) {
            $filename = 'OrderID-' . $id . '-Payment-Photo-' . $iteration . '.jpg';
            $path = public_path() . '/payment_photos';
            $file->move($path, $filename);
            $transfer_photo = new TransferPhoto;
            $transfer_photo->order_id = $id;
            $transfer_photo->image_name = $filename;
            $transfer_photo->save();

            $iteration++;
        }

        Order::where('id', $id)->update(
            array(
                'order_status' => 'Payment on Verification'
            )
        );

        return redirect('/orders/' . Auth::user()->id)->with('success', 'Your payment is successfully added, please wait for approval');
    }

    public function download_payment_images($id)
    {   
        $selected_stock_order = Order::find($id);
        $transfer_photos = $selected_stock_order->transfer_photo;

        $files = [];
        foreach ($transfer_photos as $transfer_photo) {
            $files[$transfer_photo->id] = public_path('payment_photos') . '/' . $transfer_photo->image_name;
        }

        $folderName = 'OrderID-' . $selected_stock_order->id . '-' . 'Payment-Photos' . '.zip';
        $zip = new ZipArchive;
        // $zipFile    = public_path().'/'.$folderName.'.zip';

        if ($zip->open(public_path('downloads') . '/' . $folderName, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path('downloads') . '/' . $folderName);
    }
}
