<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Services\SentimentAnalyzer;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Change this line from Product::all() to use pagination
        $products = Product::paginate(12); // Show 12 products per page
        return view('products.index', compact('products'));
    }
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products.index', compact('products'));
    // }

    public function show(Product $product)
    {
        // Get reviews for this product
        $reviews = Review::where('product_id', $product->id)
            ->where('review_type', 'review')
            ->latest()
            ->paginate(5); // Show 5 reviews per page

        return view('products.show', compact('product', 'reviews'));
    }

    // public function show(Product $product)
    // {
    //     return view('products.show', compact('product'));
    // }

    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $reviews = Review::where('product_id', $id)->where('review_type', 'review')->with('user')->latest()->get();
    //     return view('products.show', compact('product', 'reviews'));
    // }

    public function storeReview(Request $request, $id, SentimentAnalyzer $analyzer)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5', // Add validation for rating
        ]);

        $sentiment = $analyzer->analyze($request->description);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'review_type' => 'review',
            'description' => $request->description,
            'rating' => $request->rating, // Store the rating
            'sentiment_status' => $sentiment
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
