<?php

namespace App\Console\Commands;

use App\Models\btcPayments;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use CoinpaymentsAPI;
use Exception;
use Illuminate\Support\Facades\Log;

class checkTxn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:txn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $private_key = env('PRIKEY');
        $public_key = env('PUBKEY');

        // getting all today transactions
        $transactions = btcPayments::where('status', 'initialized')->whereDate('created_at', Carbon::today())->get();
        foreach ($transactions as $transaction) {
            Log::info($transaction->status);
            // getting this transaction result from the coinPayment
            try {
                $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
                $ipn_url = env('IPN_URL');
                $information = $cps_api->GetTxInfoSingle($transaction->txn_id);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
                exit();
            }

            if ($information["result"]["status_text"] == "Complete" || $information["result"]["status_text"] == "Funds received and confirmed, sending to you shortly...") {
                // checking if alrady inserted
                $security = Transaction::where('user_id', $transaction->user_id)->where('reference', 'coinPayment Gateway')->where('note', $transaction->txn_id)->count();
                if ($security < 1 && $transaction->amountf != "") {
                    // getting this user Payment ID
                    $deposit = new Transaction();
                    $deposit->user_id = $transaction->user_id;
                    $deposit->amount = $transaction->amountf;
                    $deposit->type = 'deposit';
                    $deposit->reference = 'coinPayment Gateway';
                    $deposit->sum = 'in';
                    $deposit->status = 'approved';
                    $deposit->note = $transaction->txn_id;
                    $deposit->save();
                    $transaction->status = 'complete';
                    $transaction->save();
                    Log::info('CoinPayment Payment  Success');
                } else {
                    Log::info('CoinPayment Payment Already Inserted');
                }
            } elseif ($information["result"]["status_text"] == "Complete") {
                # code...
            }

            Log::info("New Status: " . ($information["result"]["status_text"]));
        }
        return 0;
    }
}
