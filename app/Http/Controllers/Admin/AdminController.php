<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

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

    public function showReviews()
    {
        $reviews = Review::where('review_type', 'review')->with(['user', 'product'])->latest()->get();
        return view('admin.reviews', compact('reviews'));
    }

    public function showInquiries()
    {
        $inquiries = Review::where('review_type', 'inquiry')->with('user')->latest()->get();
        return view('admin.inquiries', compact('inquiries'));
    }
}
