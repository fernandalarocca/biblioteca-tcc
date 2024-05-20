<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::all();
        return view('logs.index', compact('logs'));
    }
}

