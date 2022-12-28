<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function scanner()
    {
        return view('pages.admin.scanner.index');
    }
}
