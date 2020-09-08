<?php

namespace App\Http\Controllers\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Course\{CoursePackage, CourseTransaction, CourseTransactionDetail};
use App\Models\Company\{Company, CompanyPackage, CompanyTransaction, CompanyTransactionDetail};
use Exception;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as Config;
use Midtrans\Snap as Snap;

class CheckoutController extends Controller
{
    public function process($id, $payment)
    {
        // Jika checkout berasal dari halaman Course
        if ($payment === 'course') {
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
            return \redirect()->action('Midtrans\CheckoutController@success', ['id' => $idnya, 'payment' => $payment]);

            // Jika checkout berasal dari halaman Company
        } elseif ($payment === 'company') {
            $company_package = CompanyPackage::findOrFail($id);
            $transaction = CompanyTransaction::create([
                'company_packages_id' => $id,
                'users_id' => Auth::user()->id,
                'transaction_total' => $company_package->price,
                'transaction_status' => 'IN_CART'
            ]);
            $idnya = $transaction->id;

            CompanyTransactionDetail::create([
                'company_transactions_id' => $idnya,
                'username' => Auth::user()->username
            ]);
            return \redirect()->action('Midtrans\CheckoutController@success', ['id' => $idnya, 'payment' => $payment]);
        } else {
            return \back();
        }
    }

    public function success($id, $payment)
    {
        // Jika checkout confirm berasal dari halaman Course
        if ($payment === 'course') {
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
                    'order_id' => 'COU-' . $transaction->id,
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
            // Jika checkout confirm berasal dari halaman Company
        } elseif ($payment === 'company') {
            $transaction = CompanyTransaction::findOrFail($id);
            $transaction->transaction_status = 'PENDING';
            $transaction->save();

            // konfigurasi midtrans
            Config::$serverKey = \config('midtrans.serverKey');
            Config::$isProduction = \config('midtrans.isProduction');
            Config::$isSanitized = \config('midtrans.isSanitized');
            Config::$is3ds = \config('midtrans.is3ds');

            $midtrans_params = [
                'transaction_details' => [
                    'order_id' => 'COM-' . $transaction->id,
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
        } else {
            return \redirect('/');
        }
    }
}
