<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure we have users and products
        $userIds = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        if (empty($userIds) || empty($productIds)) {
            $this->command->info('Please ensure you have users and products in the database first.');
            return;
        }

        $reviews = [];
        $inquiries = [];

        // Create at least 3 reviews for each product
        foreach ($productIds as $productId) {
            // Generate 3-5 reviews per product
            $numReviews = rand(3, 5);

            for ($i = 0; $i < $numReviews; $i++) {
                $rating = rand(1, 5);
                $sentiment = $this->getSentimentBasedOnRating($rating);
                $reviewText = $this->getReviewTextBasedOnSentiment($sentiment);

                $reviews[] = [
                    'user_id' => $userIds[array_rand($userIds)],
                    'product_id' => $productId,
                    'review_type' => 'review',
                    'description' => $reviewText,
                    'rating' => $rating,
                    'sentiment_status' => $sentiment,
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ];
            }

            // Generate 1-2 inquiries per product
            $numInquiries = rand(1, 2);

            for ($i = 0; $i < $numInquiries; $i++) {
                $inquiryText = $this->getRandomInquiry();
                $sentiment = $this->getEnhancedSentimentForInquiry($inquiryText);
                $inquiries[] = [
                    'user_id' => $userIds[array_rand($userIds)],
                    'product_id' => $productId,
                    'review_type' => 'inquiry',
                    'description' => $inquiryText,
                    'rating' => null, // Inquiries don't have ratings
                    'sentiment_status' => $sentiment,
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ];
            }
        }

        // Add some general inquiries (not tied to specific products)
        for ($i = 0; $i < 10; $i++) {
            $inquiryText = $this->getRandomGeneralInquiry();
            $sentiment = $this->getEnhancedSentimentForInquiry($inquiryText);

            $inquiries[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'product_id' => null,
                'review_type' => 'inquiry',
                'description' => $inquiryText,
                'rating' => null,
                'sentiment_status' => $sentiment,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ];
        }

        // Insert all reviews and inquiries
        DB::table('reviews')->insert(array_merge($reviews, $inquiries));

        $this->command->info('Created ' . count($reviews) . ' reviews and ' . count($inquiries) . ' inquiries.');
    }

    /**
     * Get sentiment status based on rating
     */
    private function getSentimentBasedOnRating(int $rating): string
    {
        if ($rating == 5) {
            return 'Very Positive';
        } elseif ($rating == 4) {
            return 'Positive';
        } elseif ($rating == 3) {
            return 'Neutral';
        } elseif ($rating == 2) {
            return 'Negative';
        } else {
            return 'Very Negative';
        }
    }

    /**
     * Get review text based on sentiment
     */
    private function getReviewTextBasedOnSentiment(string $sentiment): string
    {
        $veryPositiveReviews = [
            "Absolutely love this product! The quality is exceptional and it fits perfectly. The material is soft and comfortable, and the color is exactly as shown in the pictures. I've received many compliments when wearing it. Highly recommend!",
            "This is my second purchase of this product in a different color. I love everything about it - the fit, the material, the style. It's versatile and can be dressed up or down. The shipping was also super fast. Will definitely buy more!",
            "Best purchase I've made in a long time! The quality is outstanding and the design is beautiful. It's even better in person than in the photos. The attention to detail is impressive. Worth every penny!",
            "I'm absolutely thrilled with this purchase! The fabric is premium quality and the craftsmanship is excellent. It's comfortable, stylish, and has become my favorite item. The compliments keep coming whenever I wear it!",
            "Exceeded all my expectations! The product is perfect in every way - from the material to the fit to the color. Customer service was also exceptional. I'll definitely be a repeat customer!"
        ];

        $positiveReviews = [
            "Great product overall. The quality is good and it looks just like the pictures. I would have given 5 stars, but it runs a bit small so I had to exchange for a larger size. Customer service was very helpful with the exchange process.",
            "Really happy with this purchase. The material is nice quality and the design is exactly what I was looking for. Shipping was quick and the packaging was good. Would recommend to others.",
            "Good product for the price. Comfortable to wear and looks stylish. The color is vibrant and hasn't faded after washing. Just what I needed for my wardrobe.",
            "Pleased with my purchase. The product arrived on time and was well-packaged. The quality is good for the price point. Would buy from this brand again.",
            "Nice addition to my wardrobe. The fit is good and the material is comfortable. Looks just like the pictures online. Fast shipping too!"
        ];

        $neutralReviews = [
            "The product is okay. The material isn't as soft as I expected, and the color is slightly different from what's shown online. It's not bad, but I'm not completely satisfied with my purchase. Shipping was fast though.",
            "Average quality for the price. Nothing special but does the job. The sizing runs true to size. Delivery was prompt but the packaging could have been better.",
            "It's a decent product. Not amazing but not terrible either. The material is somewhat thin but acceptable for the price. Might order again in a different style.",
            "Mixed feelings about this purchase. The design is nice but the quality could be better. It's comfortable enough but I'm not sure how well it will hold up over time.",
            "It's an okay product. The color is nice but the material feels a bit cheap. Shipping was fast and customer service was responsive when I had questions."
        ];

        $negativeReviews = [
            "Disappointed with this purchase. The quality is poor and it started falling apart after just one wash. The sizing is also way off - I ordered my usual size and it's much too small. Would not recommend.",
            "Not happy with this product. The material is thin and feels cheap. The color is also different from what was shown online. Save your money and look elsewhere.",
            "Below average quality. The stitching is coming undone after just a few wears and the material is not as described. Customer service was slow to respond to my complaint.",
            "Wouldn't recommend this product. The fit is awkward and uncomfortable. The material also wrinkles easily and is difficult to maintain. Not worth the price.",
            "Regret this purchase. The product looked much better online than in person. The quality is disappointing and it doesn't look flattering when worn. Will be returning."
        ];

        $veryNegativeReviews = [
            "Terrible product! Complete waste of money. The quality is awful and it fell apart after the first use. The sizing is completely wrong too. Extremely disappointed and will never buy from this brand again.",
            "Worst purchase I've made online. The product is nothing like the description or photos. The material feels like plastic and the craftsmanship is terrible. Avoid at all costs!",
            "Absolutely horrible quality! I'm shocked that they can sell something this bad. It looks cheap, feels cheap, and is poorly made. Don't waste your money like I did.",
            "Extremely disappointed! The product arrived damaged and when I contacted customer service, they were unhelpful. The quality is abysmal and not worth even a fraction of the price.",
            "Complete disaster of a product. Poorly made with cheap materials. Sizing is way off and the design looks nothing like the pictures. Trying to return it has been a nightmare too."
        ];

        switch ($sentiment) {
            case 'Very Positive':
                return $veryPositiveReviews[array_rand($veryPositiveReviews)];
            case 'Positive':
                return $positiveReviews[array_rand($positiveReviews)];
            case 'Neutral':
                return $neutralReviews[array_rand($neutralReviews)];
            case 'Negative':
                return $negativeReviews[array_rand($negativeReviews)];
            case 'Very Negative':
                return $veryNegativeReviews[array_rand($veryNegativeReviews)];
            default:
                return $neutralReviews[array_rand($neutralReviews)];
        }
    }

    /**
     * Get a random product-specific inquiry
     */
    private function getRandomInquiry(): string
    {
        $inquiries = [
            "Does this come in other colors besides what's shown?",
            "What material is this made from? Is it suitable for sensitive skin?",
            "Is this product machine washable or dry clean only?",
            "Do you offer international shipping for this item?",
            "How long is the shipping time for this product?",
            "Is this item currently in stock? When will it be restocked if not?",
            "Does this product come with a warranty or guarantee?",
            "What are the exact dimensions of this product?",
            "Is this suitable for gift wrapping? Do you offer that service?",
            "Can I get this product customized or personalized?",
            "Is this product eco-friendly or sustainably made?",
            "Do you have a size guide for this product? I'm between sizes.",
            "Can this product be returned if it doesn't fit properly?",
            "Is this product suitable for children or is it adults only?",
            "Does this product require any special care instructions?",
            "I love the design of this product! Can you tell me if it comes in a larger size?",
            "I'm very disappointed with the quality of this product. How can I return it for a refund?",
            "This product is amazing! Do you have any similar items you would recommend?",
            "I received a damaged item. Can you please send a replacement as soon as possible?",
            "I've been waiting for this product to be back in stock for weeks. When will it be available again?"
        ];

        return $inquiries[array_rand($inquiries)];
    }

    /**
     * Get a random general inquiry (not product-specific)
     */
    private function getRandomGeneralInquiry(): string
    {
        $generalInquiries = [
            "What is your return policy? How many days do I have to return items?",
            "Do you offer any discounts for first-time customers?",
            "I'm having trouble placing an order on your website. Can you help?",
            "How can I track my order once it's been shipped?",
            "Do you have a loyalty program or rewards for frequent shoppers?",
            "What payment methods do you accept on your website?",
            "How can I change my shipping address for an order I already placed?",
            "Do you have physical stores or are you online only?",
            "I received a damaged item in my last order. What should I do?",
            "Can I cancel my order if it hasn't shipped yet?",
            "Do you offer gift cards or store credit options?",
            "What are your customer service hours?",
            "How can I update my account information?",
            "Do you ship to PO boxes or military addresses?",
            "I love your brand! When will you be launching new collections?",
            "I'm extremely frustrated with your customer service. I've been trying to resolve an issue for weeks!",
            "Thank you for the excellent service! Your team went above and beyond to help me.",
            "I'm concerned about the security of my payment information on your website. What measures do you have in place?",
            "My order has been delayed for over a week now. This is unacceptable!",
            "I'm interested in wholesale opportunities. Do you have a program for retailers?"
        ];

        return $generalInquiries[array_rand($generalInquiries)];
    }

    /**
     * Get enhanced sentiment for an inquiry with more variety
     */
    private function getEnhancedSentimentForInquiry(string $inquiry): string
    {
        // Keywords that indicate sentiment
        $veryPositiveKeywords = ['love', 'amazing', 'excellent', 'fantastic', 'outstanding', 'thrilled'];
        $positiveKeywords = ['good', 'nice', 'happy', 'pleased', 'thank you', 'thanks', 'helpful'];
        $negativeKeywords = ['disappointed', 'unhappy', 'poor', 'issue', 'problem', 'trouble', 'damaged'];
        $veryNegativeKeywords = ['terrible', 'awful', 'horrible', 'worst', 'frustrated', 'unacceptable', 'never'];

        $inquiryLower = strtolower($inquiry);

        // Check for very positive sentiment
        foreach ($veryPositiveKeywords as $keyword) {
            if (strpos($inquiryLower, $keyword) !== false) {
                return 'Very Positive';
            }
        }

        // Check for positive sentiment
        foreach ($positiveKeywords as $keyword) {
            if (strpos($inquiryLower, $keyword) !== false) {
                return 'Positive';
            }
        }

        // Check for very negative sentiment
        foreach ($veryNegativeKeywords as $keyword) {
            if (strpos($inquiryLower, $keyword) !== false) {
                return 'Very Negative';
            }
        }

        // Check for negative sentiment
        foreach ($negativeKeywords as $keyword) {
            if (strpos($inquiryLower, $keyword) !== false) {
                return 'Negative';
            }
        }

        // If no specific sentiment is detected, randomly assign a sentiment with a bias toward neutral
        $random = rand(1, 100);
        if ($random <= 50) {
            return 'Neutral';
        } elseif ($random <= 70) {
            return 'Positive';
        } elseif ($random <= 85) {
            return 'Negative';
        } elseif ($random <= 95) {
            return 'Very Positive';
        } else {
            return 'Very Negative';
        }
    }


    /**
     * Generate a subject line from the inquiry text
     */
    private function generateSubjectFromInquiry(string $inquiry): string
    {
        // Extract first few words (up to 8) for the subject
        $words = explode(' ', $inquiry);
        $subjectWords = array_slice($words, 0, min(8, count($words)));
        $subject = implode(' ', $subjectWords);

        // Add ellipsis if truncated
        if (count($words) > 8) {
            $subject .= '...';
        }

        // Common subject prefixes
        $prefixes = [
            'Question about ',
            'Inquiry: ',
            'Help with ',
            'Information on ',
            'Request: ',
            '', // Sometimes no prefix
            '',
            ''
        ];

        // For specific types of inquiries, use more specific subjects
        if (stripos($inquiry, 'shipping') !== false) {
            return 'Shipping Question';
        } elseif (stripos($inquiry, 'return') !== false) {
            return 'Return Policy Inquiry';
        } elseif (stripos($inquiry, 'size') !== false || stripos($inquiry, 'fit') !== false) {
            return 'Size & Fit Question';
        } elseif (stripos($inquiry, 'damaged') !== false || stripos($inquiry, 'broken') !== false) {
            return 'Damaged Item Report';
        } elseif (stripos($inquiry, 'discount') !== false || stripos($inquiry, 'coupon') !== false || stripos($inquiry, 'sale') !== false) {
            return 'Discount Inquiry';
        } elseif (stripos($inquiry, 'track') !== false || stripos($inquiry, 'order status') !== false) {
            return 'Order Tracking Question';
        } elseif (stripos($inquiry, 'cancel') !== false) {
            return 'Order Cancellation Request';
        }

        // For general inquiries, use a prefix + truncated inquiry
        if (strlen($subject) < 5) {
            return 'General Inquiry';
        }

        // 50% chance to use a prefix
        if (rand(0, 1) == 1) {
            $prefix = $prefixes[array_rand($prefixes)];
            return $prefix . $subject;
        }

        return $subject;
    }
}
