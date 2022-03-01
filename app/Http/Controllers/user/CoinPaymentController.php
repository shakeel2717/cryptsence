<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\btcPayments;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoinPaymentController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('CoinPayment webhook Start');

        $merchant_id = env('COINPAYMENTSMERCHANT');
        $ipn_secret = env('IPN_SECRET');
        Log::info('CoinPayment webhook  Init');
        $txn_id = $request->txn_id;
        $payment = btcPayments::where("txn_id", $txn_id)->first();
        $order_currency = $payment->to_currency; //BTC
        $order_total = $payment->amount; //BTC

        if (!isset($request->ipn_mode) || $request->ipn_mode != 'hmac') {
            edie("IPN Mode is not HMAC");
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            edie("No HMAC Signature Sent.");
        }

        $requestFile = file_get_contents('php://input');
        if ($requestFile === false || empty($requestFile)) {
            edie("Error in reading Post Data");
        }

        if (!isset($request->merchant) || $request->merchant != trim($merchant_id)) {
            edie("No or incorrect merchant id.");
        }

        $hmac =  hash_hmac("sha512", $requestFile, trim($ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            edie("HMAC signature does not match.");
        }

        $amount1 = floatval($request->amount1); //IN USD
        $amount2 = floatval($request->amount2); //IN BTC
        $currency1 = $request->currency1; //USD
        $currency2 = $request->currency2; //BTC
        $status = intval($request->status);

        if ($currency2 != $order_currency) {
            edie("Currency Mismatch");
        }

        if ($amount2 < $order_total) {
            edie("Amount is lesser than order total");
        }

        if ($status == 1 || $status == 2) {
            // Payment is complete
            $payment->status = "success";
            $payment->save();

            // Inserting User Plan
            // getting this user Payment ID
            $deposit = new Transaction();
            $deposit->user_id = $payment->id;
            $deposit->amount = $amount1;
            $deposit->type = 'deposit';
            $deposit->reference = 'coinPayment Gateway';
            $deposit->sum = 'in';
            $deposit->status = 'approved';
            $deposit->save();

        } else if ($status < 0) {
            // Payment Error
            $payment->status = "error";
            $payment->save();
        } else {
            // Payment Pending
            $payment->status = "pending";
            $payment->save();
        }
    }
}
