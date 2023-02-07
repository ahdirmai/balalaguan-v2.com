<?php

namespace App\Http\Controllers\Coadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoadminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.coadmin.index');
    }
}