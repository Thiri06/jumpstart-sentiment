<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Create regular users
        User::factory(10)->create();

        // Create products
        $products = [
            [
                'name' => 'Summer Dress',
                'description' => 'Light and comfortable summer dress perfect for hot days.',
                'price' => 49.99,
                'category' => 'Women',
                'active' => true,
            ],
            [
                'name' => 'Slim Fit Jeans',
                'description' => 'Classic slim fit jeans that go with everything.',
                'price' => 59.99,
                'category' => 'Men',
                'active' => true,
            ],
            [
                'name' => 'Leather Jacket',
                'description' => 'Premium leather jacket for a stylish look.',
                'price' => 199.99,
                'category' => 'Men',
                'active' => true,
            ],
            [
                'name' => 'Floral Blouse',
                'description' => 'Elegant floral blouse for casual and formal occasions.',
                'price' => 39.99,
                'category' => 'Women',
                'active' => true,
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Comfortable running shoes with excellent support.',
                'price' => 89.99,
                'category' => 'Footwear',
                'active' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Create sample reviews with sentiment analysis
        $reviews = [
            [
                'product_id' => 1,
                'user_id' => 2,
                'text' => 'I love this dress! The fabric is so comfortable and the fit is perfect.',
                'sentiment' => 'positive',
                'score' => 0.95,
                'approved' => true,
            ],
            [
                'product_id' => 1,
                'user_id' => 3,
                'text' => 'The color is not as shown in the picture. Very disappointed.',
                'sentiment' => 'negative',
                'score' => 0.85,
                'approved' => true,
            ],
            [
                'product_id' => 2,
                'user_id' => 4,
                'text' => 'These jeans fit perfectly and look great. Highly recommend!',
                'sentiment' => 'positive',
                'score' => 0.92,
                'approved' => true,
            ],
            [
                'product_id' => 3,
                'user_id' => 5,
                'text' => 'The jacket is good quality but runs small. Order a size up.',
                'sentiment' => 'positive',
                'score' => 0.65,
                'approved' => true,
            ],
            [
                'product_id' => 3,
                'user_id' => 6,
                'text' => 'Terrible quality for the price. The zipper broke after just two weeks.',
                'sentiment' => 'negative',
                'score' => 0.88,
                'approved' => true,
            ],
            [
                'product_id' => 4,
                'user_id' => 7,
                'text' => 'Beautiful blouse, exactly as pictured. The material is high quality.',
                'sentiment' => 'positive',
                'score' => 0.94,
                'approved' => true,
            ],
            [
                'product_id' => 5,
                'user_id' => 8,
                'text' => 'These shoes are uncomfortable and gave me blisters. Not worth the money.',
                'sentiment' => 'negative',
                'score' => 0.91,
                'approved' => true,
            ],
            [
                'product_id' => 5,
                'user_id' => 9,
                'text' => 'Great running shoes! Comfortable from day one and good support.',
                'sentiment' => 'positive',
                'score' => 0.89,
                'approved' => true,
            ],
            [
                'product_id' => 2,
                'user_id' => 10,
                'text' => 'The jeans ripped after just a few wears. Poor quality.',
                'sentiment' => 'negative',
                'score' => 0.87,
                'approved' => false,
            ],
            [
                'product_id' => 4,
                'user_id' => 11,
                'text' => 'The blouse shrunk after washing. Very disappointed.',
                'sentiment' => 'negative',
                'score' => 0.82,
                'approved' => false,
            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
