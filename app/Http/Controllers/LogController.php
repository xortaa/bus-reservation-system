<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (File::exists($logFile)) {
            $logs = array_slice(file($logFile), -100);
            $logs = array_reverse($logs);
        }

        return view('logs.index', compact('logs'));
    }
}

