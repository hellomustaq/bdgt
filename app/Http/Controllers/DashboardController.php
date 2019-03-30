<?php

namespace App\Http\Controllers;

use App\Resources\Transaction;
use App\Resources\Bill;
use App\Resources\Ledger;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $transactions = Transaction::all();

        return view('dashboard')->with([
            'ledger' => new Ledger,
            'nextBill' => Bill::all()->sortBy(function ($bill) {
                return $bill->nextDue;
            })->first(),
            'transactions' => $transactions,
        ]);
    }
}