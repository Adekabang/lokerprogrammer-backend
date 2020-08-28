<?php

namespace App\Http\Controllers\CheckoutCourse;

use App\Http\Controllers\Controller;
use App\Models\Course\CoursePackage;
use App\Models\Course\CourseTransaction;
use App\Models\Course\CourseTransactionDetail;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as Config;
use Midtrans\Snap as Snap;

class CheckoutController extends Controller
{
    public function process(Request $request, $id)
    {
        $course_package = CoursePackage::findOrFail($id);
        $transaction = CourseTransaction::create([
            'course_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'transaction_total' => $course_package->price,
            'transaction_status' => 'IN_CART'
        ]);
        $idnya = $transaction->id;

        CourseTransactionDetail::create([
            'course_transactions_id' => $idnya,
            'username' => Auth::user()->username
        ]);
        return \redirect()->action('CheckoutCourse\CheckoutController@success', ['id' => $idnya]);
    }

    public function success(Request $request, $id)
    {
        //Goes to Midtrans
        $transaction = CourseTransaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();

        // konfigurasi midtrans
        Config::$serverKey = \config('midtrans.serverKey');
        Config::$isProduction = \config('midtrans.isProduction');
        Config::$isSanitized = \config('midtrans.isSanitized');
        Config::$is3ds = \config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'COURSES-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect to Snap Payment Page
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
