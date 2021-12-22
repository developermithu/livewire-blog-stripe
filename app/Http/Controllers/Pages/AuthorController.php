<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('pages.authors.index', [
            'authors' => User::where('type', User::WRITER)->get(),
        ]);
    }

    public function show(User $user)
    {
        return view('pages.authors.show', compact('user'));
    }
}
