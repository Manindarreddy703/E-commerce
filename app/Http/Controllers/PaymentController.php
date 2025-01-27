<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    // Initiate Payment
    public function initiatePayment(Request $request)
    {
        $payload = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'transactionId' => 'TXN' . time(),
            'amount' => 1000, // Amount in paise (₹10.00)
            'currency' => 'INR',
            'redirectUrl' => route('payment.callback'),
            'callbackUrl' => route('payment.callback'),
            'paymentInstrument' => [
                'type' => 'UPI_QR',
            ],
        ];

        $url = env('PHONEPE_HOST') . '/v1/initiatePayment';
        $headers = [
            'Authorization' => 'Bearer ' . env('PHONEPE_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->post($url, $payload);

        if ($response->ok()) {
            $data = $response->json();

            // Redirect to PhonePe's checkout page
            return redirect()->away($data['url']);
        }

        return back()->withErrors(['error' => 'Payment initiation failed.']);
    }

    // Handle Callback
    public function paymentCallback(Request $request)
    {
        $transactionId = $request->input('transactionId');
        $status = $request->input('status');

        if ($status === 'SUCCESS') {
            // Mark order as paid in your database
        } else {
            // Handle failure or pending status
        }

        return redirect()->route('home')->with('status', 'Payment ' . $status);
    }

    // Check Payment Status
    public function checkPaymentStatus($transactionId)
    {
        $payload = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'transactionId' => $transactionId,
        ];

        $url = env('PHONEPE_HOST') . '/v1/status';
        $headers = [
            'Authorization' => 'Bearer ' . env('PHONEPE_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->post($url, $payload);

        return $response->json();
    }
}
