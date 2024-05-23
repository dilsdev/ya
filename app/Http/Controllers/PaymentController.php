<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handlePaymentStatus(Request $request)
    {
        $orderId = $request->query('order_id');
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        return view('user/payment-status', [
            'orderId' => $orderId,
            'statusCode' => $statusCode,
            'transactionStatus' => $transactionStatus,
        ]);
    }
}
