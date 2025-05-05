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
                $sentiment = $this->getSentimentForInquiry($inquiryText);

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
        for ($i = 0; $i < 5; $i++) {
            $inquiryText = $this->getRandomGeneralInquiry();
            $sentiment = $this->getSentimentForInquiry($inquiryText);

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
            "Does this product require any special care instructions?"
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
            "I love your brand! When will you be launching new collections?"
        ];

        return $generalInquiries[array_rand($generalInquiries)];
    }

    /**
     * Get sentiment for an inquiry
     */
    private function getSentimentForInquiry(string $inquiry): string
    {
        // Most inquiries are neutral
        if (
            strpos(strtolower($inquiry), 'love') !== false ||
            strpos(strtolower($inquiry), 'great') !== false ||
            strpos(strtolower($inquiry), 'amazing') !== false
        ) {
            return 'Positive';
        } elseif (
            strpos(strtolower($inquiry), 'problem') !== false ||
            strpos(strtolower($inquiry), 'issue') !== false ||
            strpos(strtolower($inquiry), 'trouble') !== false ||
            strpos(strtolower($inquiry), 'damaged') !== false
        ) {
            return 'Negative';
        } else {
            return 'Neutral';
        }
    }
}
