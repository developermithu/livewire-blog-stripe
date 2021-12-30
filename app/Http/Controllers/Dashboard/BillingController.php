<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index()
    {
        $invoices = Auth::user()->invoices();
        return view('dashboard.billing.index', compact('invoices'));
    }

    public function download(Request $request, $invoiceId)
    {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => 'Your Company Name',
            'product' => auth()->user()->subscription(),
        ],  'my-invoice');
    }
}
