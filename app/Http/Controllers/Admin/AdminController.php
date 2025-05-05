<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth', 'admin'];
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
