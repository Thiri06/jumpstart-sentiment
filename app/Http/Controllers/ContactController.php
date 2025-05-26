<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Services\SentimentAnalyzer;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function storeInquiry(Request $request, SentimentAnalyzer $analyzer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $sentiment = $analyzer->analyze($request->description);

        Review::create([
            'user_id' => Auth::id(),
            'review_type' => 'inquiry',
            'description' => $request->description,
            'sentiment_status' => $sentiment
        ]);

        return redirect()->back()->with('success', 'Inquiry submitted successfully!');
    }
}
