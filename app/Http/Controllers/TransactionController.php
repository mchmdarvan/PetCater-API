<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function getTransaction()
    {
        $user = Transaction::where('users_id', auth()->user()->id)->get();
        $user->load(['user']);

        return $this->response($user);
    }

    public function getTransactionDetail($id)
    {
        $transaction = TransactionDetail::where('transactions_id', $id)->get();
        $transaction->load(['transaction', 'product']);

        return $this->response($transaction);
    }
}
