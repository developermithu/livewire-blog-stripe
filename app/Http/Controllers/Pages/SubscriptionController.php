<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function update($subscription)
    {
        auth()->user()->subscription($subscription)->resume();  //cashier function
        return redirect()->route('membership')->with('success', "You successfully resumed your $subscription subscription");
    }

    public function destroy($subscription)
    {
        $user = Auth::user();
        $user->subscription($subscription)->cancel();  //cashier function
        return redirect()->route('membership')->with('success', "You successfully canceled your $subscription subscription");
    }
}
