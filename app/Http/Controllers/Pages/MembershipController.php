<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function __invoke()
    {
        $plans = Plan::all();
        return view('pages.membership.index', compact('plans'));
    }
}
