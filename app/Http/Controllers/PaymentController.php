<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use PDF;


class PaymentController extends Controller
{
    public function packageBooking($id)
    {
        // dd($id);
        $package = Package::find($id);
        // dd($package);
        return view('booknow', compact('package'));

    }


    public function submit_payment(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:test_b8d042bb5122e98c6027ee5821c",
                "X-Auth-Token:test_64693af424542204b33ede6fb5b"
            )
        );

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|max:10|min:10',
        ]);
        // dd($request->all());
        $getlastId = Order::orderBy('id', 'desc')->first();
        // dd($getlastId);
        if ($getlastId) {
            $order_id = "Abhiram" . time() . $getlastId->id + 1;
        } else {
            $order_id = "Abhiram" . time() . '1';
        }
        $package = Package::where('id', $request->package_id)->first();
        // dd($package);


        $total = $package->amount;


        $order = new Order;
        $order->order_id = $order_id;
        $order->package_id = $package->id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->status = 'Pending';
        $order->payable_price = $total;
        $order->order_price = $total;
        $order->save();

        $payload = array(
            'purpose' => $order_id,
            'amount' => $total,
            'phone' => $request->phone,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://127.0.0.1:8000/redirect/',
            'send_email' => true,
            'send_sms' => true,
            'email' => $request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        // echo $response;
        $response = json_decode($response);
        if (isset($response->success) && $response->success === true) {
            // Retrieve the payment_request_id
            $paymentRequestId = $response->payment_request->id;

            // Update the order with the payment_request_id
            $order->payment_request_id = $paymentRequestId;
            $order->save();

            // Redirect the user to the payment gateway
            return redirect($response->payment_request->longurl);
        } else {
            // Handle payment request creation failure here if needed
        }


    }

    public function redirect(Request $request)
    {
        $paymentRequestId = $request->input('payment_request_id');
        $data = Order::with('package')->where('payment_request_id', $paymentRequestId)->first();
        return view('thank-you', compact('data'));
    }

    public function invoiceDownload($id)
    {
        $data = Order::with('package')->where('id', $id)->first();
        // dd($data);

        $pdf = PDF::loadView('invoice', compact('data'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }



}