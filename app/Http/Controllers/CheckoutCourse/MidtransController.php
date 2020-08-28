<?php

namespace App\Http\Controllers\CheckoutCourse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\CourseTransaction;
use App\Models\Membership\CourseMembership;
use Carbon\Carbon;
use Midtrans\Notification;
use Midtrans\Config;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat instance midtrans notification
        $notification  = new Notification();
        // Pecah order ID agar bisa diterima database
        $orderID = \explode('-', $notification->order_id);

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $orderID[1];

        // Cari transaksi berdasarkan ID
        $transaction = CourseTransaction::findOrFail($order_id);
        $package = 0;
        if ($transaction->course_packages_id === 1) {
            $package = Carbon::now()->addMonths(1);
        } elseif ($transaction->course_packages_id === 2) {
            $package = Carbon::now()->addMonths(2);
        } elseif ($transaction->course_packages_id === 3) {
            $package = Carbon::now()->addMonths(3);
        } else {
            $package = null;
        }


        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        } else if ($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
            // insert to membership
            $membership = new CourseMembership();
            $membership->users_id = $transaction->users_id;
            $membership->course_packages_id = $transaction->course_packages_id;
            $membership->expires_at = $package;
            $membership->save();
        } else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->transaction_status = 'FAILED';
        } else if ($status == 'expire') {
            $transaction->transaction_status = 'EXPIRED';
        } else if ($status == 'cancel') {
            $transaction->transaction_status = 'FAILED';
        }

        // Simpan transaksi
        $transaction->save();

        // Kirimkan email
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }

    public function finishRedirect(Request $request)
    {
        return \view('pages.front.kelas.success-checkout');
    }
    public function unfinishRedirect(Request $request)
    {
        return \view('pages.front.kelas.unfinish-checkout');
    }
    public function errorRedirect(Request $request)
    {
        return \view('pages.front.kelas.error-checkout');
    }
}
