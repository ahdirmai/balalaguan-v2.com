<?php

namespace App\Http\Controllers\Coadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function scanner()
    {
        return view('pages.coadmin.scanner.index');
    }
}