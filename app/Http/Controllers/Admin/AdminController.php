<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth', 'admin'];
    }

    public function dashboard()
    {
        // Get total products count
        $totalProducts = Product::count();

        // Get total reviews count
        $totalReviews = Review::where('review_type', 'review')->count();

        // Get total users count (excluding admins)
        $totalUsers = User::where('is_admin', false)->count();

        // Get total inquiries count
        $totalInquiries = Review::where('review_type', 'inquiry')->count();

        // Calculate sentiment percentages
        $sentimentCounts = Review::where('review_type', 'review')
            ->select('sentiment_status', DB::raw('count(*) as count'))
            ->whereNotNull('sentiment_status')
            ->groupBy('sentiment_status')
            ->pluck('count', 'sentiment_status')
            ->toArray();

        $totalSentimentReviews = array_sum($sentimentCounts);

        // Group the five sentiment statuses into three categories for the dashboard display
        $sentimentPercentages = [
            'positive' => $totalSentimentReviews > 0 ?
                round((($sentimentCounts['Positive'] ?? 0) + ($sentimentCounts['Very Positive'] ?? 0)) / $totalSentimentReviews * 100) : 0,
            'negative' => $totalSentimentReviews > 0 ?
                round((($sentimentCounts['Negative'] ?? 0) + ($sentimentCounts['Very Negative'] ?? 0)) / $totalSentimentReviews * 100) : 0,
            'neutral' => $totalSentimentReviews > 0 ?
                round(($sentimentCounts['Neutral'] ?? 0) / $totalSentimentReviews * 100) : 0,
        ];

        // Count pending analysis reviews (those without sentiment status)
        $pendingAnalysis = Review::where('review_type', 'review')
            ->whereNull('sentiment_status')
            ->count();

        // Get growth rates (for demonstration - you would need historical data for real metrics)
        // This is a simplified example - in a real app you might compare to last month's data
        $productGrowth = 12; // Placeholder - replace with actual calculation
        $reviewGrowth = 8;   // Placeholder - replace with actual calculation
        $userGrowth = 5;     // Placeholder - replace with actual calculation
        $inquiryGrowth = -3; // Placeholder - replace with actual calculation

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalReviews',
            'totalUsers',
            'totalInquiries',
            'sentimentPercentages',
            'pendingAnalysis',
            'productGrowth',
            'reviewGrowth',
            'userGrowth',
            'inquiryGrowth'
        ));
    }

    public function showReviews()
    {
        // Get reviews with pagination
        $reviews = Review::where('review_type', 'review')
            ->with(['user', 'product'])
            ->latest()
            ->paginate(10); // Show 10 reviews per page

        // Calculate sentiment statistics
        $allReviews = Review::where('review_type', 'review')->get();

        $positiveCount = $allReviews->whereIn('sentiment_status', ['Positive', 'Very Positive'])->count();
        $negativeCount = $allReviews->whereIn('sentiment_status', ['Negative', 'Very Negative'])->count();
        $neutralCount = $allReviews->where('sentiment_status', 'Neutral')->count();
        $pendingCount = $allReviews->whereNull('sentiment_status')->count();

        $totalWithSentiment = $positiveCount + $negativeCount + $neutralCount;

        $sentimentStats = [
            'positive' => [
                'count' => $positiveCount,
                'percentage' => $totalWithSentiment > 0 ? round(($positiveCount / $totalWithSentiment) * 100) : 0
            ],
            'negative' => [
                'count' => $negativeCount,
                'percentage' => $totalWithSentiment > 0 ? round(($negativeCount / $totalWithSentiment) * 100) : 0
            ],
            'neutral' => [
                'count' => $neutralCount,
                'percentage' => $totalWithSentiment > 0 ? round(($neutralCount / $totalWithSentiment) * 100) : 0
            ],
            'pending' => [
                'count' => $pendingCount,
                'percentage' => $allReviews->count() > 0 ? round(($pendingCount / $allReviews->count()) * 100) : 0
            ]
        ];

        return view('admin.reviews', compact('reviews', 'sentimentStats'));
    }

    public function deleteReview(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews')->with('success', 'Review deleted successfully');
    }


    public function showInquiries()
    {
        // Get inquiries with pagination
        $inquiries = Review::where('review_type', 'inquiry')
            ->with('user')
            ->latest()
            ->paginate(10); // Show 10 inquiries per page

        // Calculate sentiment statistics
        $allInquiries = Review::where('review_type', 'inquiry')->get();

        $positiveCount = $allInquiries->whereIn('sentiment_status', ['Positive', 'Very Positive'])->count();
        $negativeCount = $allInquiries->whereIn('sentiment_status', ['Negative', 'Very Negative'])->count();
        $neutralCount = $allInquiries->where('sentiment_status', 'Neutral')->count();
        $pendingCount = $allInquiries->whereNull('sentiment_status')->count();

        $totalWithSentiment = $positiveCount + $negativeCount + $neutralCount;

        $sentimentStats = [
            'positive' => [
                'count' => $positiveCount,
                'percentage' => $totalWithSentiment > 0 ? round(($positiveCount / $totalWithSentiment) * 100) : 0
            ],
            'negative' => [
                'count' => $negativeCount,
                'percentage' => $totalWithSentiment > 0 ? round(($negativeCount / $totalWithSentiment) * 100) : 0
            ],
            'neutral' => [
                'count' => $neutralCount,
                'percentage' => $totalWithSentiment > 0 ? round(($neutralCount / $totalWithSentiment) * 100) : 0
            ],
            'pending' => [
                'count' => $pendingCount,
                'percentage' => $allInquiries->count() > 0 ? round(($pendingCount / $allInquiries->count()) * 100) : 0
            ]
        ];

        // Calculate response statistics
        $respondedCount = $allInquiries->where('status', 'responded')->count();
        $pendingResponseCount = $allInquiries->where('status', 'pending')->count();
        $urgentCount = $allInquiries->where('priority', 'high')->count();

        $responseStats = [
            'responded' => [
                'count' => $respondedCount,
                'percentage' => $allInquiries->count() > 0 ? round(($respondedCount / $allInquiries->count()) * 100) : 0
            ],
            'pending' => [
                'count' => $pendingResponseCount,
                'percentage' => $allInquiries->count() > 0 ? round(($pendingResponseCount / $allInquiries->count()) * 100) : 0
            ],
            'urgent' => [
                'count' => $urgentCount,
                'percentage' => $allInquiries->count() > 0 ? round(($urgentCount / $allInquiries->count()) * 100) : 0
            ]
        ];

        return view('admin.inquiries', compact('inquiries', 'sentimentStats', 'responseStats'));
    }

    public function deleteInquiry(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.inquiries')->with('success', 'Inquiry deleted successfully');
    }
}
