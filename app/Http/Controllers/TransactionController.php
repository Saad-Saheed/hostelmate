<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show(Transaction $transaction)
    {
        # code...
    }

    public function myTransaction()
    {
        $transactions = auth()->user()->transactions;
        return view('student.transactions.index', compact('transactions'));
    }

    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transactions.index', compact('transactions'));
    }
}
