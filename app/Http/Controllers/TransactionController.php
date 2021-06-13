<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function getTransaction()
    {
        $user = Transaction::where('users_id', auth()->user()->id)->get();
        $user->load(['user']);

        return $this->response($user);
    }
}
