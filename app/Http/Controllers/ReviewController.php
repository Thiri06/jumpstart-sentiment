<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Services\SentimentAnalyzer;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function storeProductReview(Request $request, $productId, SentimentAnalyzer $analyzer)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
        ]);

        $sentiment = $analyzer->analyze($request->description);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'review_type' => 'review',
            'description' => $request->description,
            'sentiment_status' => $sentiment
        ]);

        return redirect()->route('products.show', $productId)->with('success', 'Review submitted.');
    }

    public function storeInquiry(Request $request, SentimentAnalyzer $analyzer)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
        ]);

        $sentiment = $analyzer->analyze($request->description);

        Review::create([
            'user_id' => Auth::id(),
            'review_type' => 'inquiry',
            'description' => $request->description,
            'sentiment_status' => $sentiment
        ]);

        return redirect()->route('contact.show')->with('success', 'Inquiry sent.');
    }
}
