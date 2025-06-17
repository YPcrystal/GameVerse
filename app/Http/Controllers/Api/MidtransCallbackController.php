<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function receive(Request $request)
    {
        $notification = $request->all();
        $transactionStatus = $notification['transaction_status'] ?? null;
        $orderId = $notification['order_id'] ?? null;
        $paymentType = $notification['payment_type'] ?? null;
        $fraudStatus = $notification['fraud_status'] ?? null;

        Log::info('Midtrans Notification Received', [
            'transaction_status' => $transactionStatus,
            'order_id' => $orderId,
            'payment_type' => $paymentType,
            'fraud_status' => $fraudStatus,
        ]);

        // Ambil id iklan dari order_id (format: IKLAN-{id}-{timestamp})
        $iklanId = null;
        if ($orderId && preg_match('/IKLAN-(\d+)-/', $orderId, $matches)) {
            $iklanId = $matches[1];
        }

        if ($iklanId) {
            $iklan = Iklan::find($iklanId);
            if ($iklan) {
                switch ($transactionStatus) {
                    case 'capture':
                        if ($paymentType == 'credit_card' && $fraudStatus == 'challenge') {
                            $iklan->status = 'challenge';
                        } else {
                            $iklan->status = 'paid';
                        }
                        break;
                    case 'settlement':
                        $iklan->status = 'paid';
                        break;
                    case 'pending':
                        $iklan->status = 'pending';
                        break;
                    case 'deny':
                        $iklan->status = 'denied';
                        break;
                    case 'expire':
                        $iklan->status = 'expired';
                        break;
                    case 'cancel':
                        $iklan->status = 'canceled';
                        break;
                }
                $iklan->save();
            }
        }

        return response()->json(['status' => 'OK']);
    }
}

