<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Women's Fashion
            [
                'name' => 'Classic White T-Shirt',
                'price' => 24.99,
                'description' => 'A comfortable and versatile white t-shirt made from 100% organic cotton. Perfect for everyday wear with a relaxed fit and soft feel. This wardrobe essential pairs well with jeans, skirts, or layered under jackets.',
                'available_colors' => json_encode(['#FFFFFF', '#000000', '#C0C0C0', '#87CEEB']),
                'tags' => json_encode(['Women', 'Basics', 'T-Shirts', 'Summer']),
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Summer Floral Dress',
                'price' => 49.99,
                'description' => 'A beautiful floral print dress perfect for summer days. Features a flattering A-line cut, lightweight breathable fabric, and adjustable straps. The vibrant floral pattern adds a touch of elegance to your casual wardrobe.',
                'available_colors' => json_encode(['#FFB6C1', '#98FB98', '#87CEFA']),
                'tags' => json_encode(['Women', 'Dresses', 'Summer', 'Floral']),
                'image' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elegant Blouse',
                'price' => 34.99,
                'description' => 'An elegant and versatile blouse that transitions seamlessly from office to evening. Made from silky smooth fabric with a subtle sheen, featuring a flattering V-neck and flowing sleeves. Perfect for professional or special occasions.',
                'available_colors' => json_encode(['#FFFFFF', '#000000', '#FFB6C1', '#E6E6FA']),
                'tags' => json_encode(['Women', 'Tops', 'Formal', 'Office']),
                'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'High-Waisted Skinny Jeans',
                'price' => 59.99,
                'description' => 'Classic high-waisted skinny jeans with a comfortable stretch. These jeans hug your curves in all the right places while providing all-day comfort. The premium denim holds its shape and resists fading, making these a long-lasting wardrobe staple.',
                'available_colors' => json_encode(['#000080', '#1E90FF', '#000000', '#808080']),
                'tags' => json_encode(['Women', 'Bottoms', 'Jeans', 'Casual']),
                'image' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Men's Fashion
            [
                'name' => 'Slim Fit Jeans',
                'price' => 59.99,
                'description' => 'Modern slim fit jeans with a comfortable stretch. These jeans offer both style and comfort for all-day wear. The premium denim is durable yet soft, with a perfect amount of stretch to maintain shape while allowing freedom of movement.',
                'available_colors' => json_encode(['#000080', '#1E90FF', '#000000']),
                'tags' => json_encode(['Men', 'Bottoms', 'Jeans', 'Casual']),
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casual Hoodie',
                'price' => 45.99,
                'description' => 'Soft and warm hoodie perfect for casual days. Features a kangaroo pocket, adjustable hood, and ribbed cuffs and hem. Made from a premium cotton-polyester blend that provides exceptional comfort and durability, perfect for cooler weather.',
                'available_colors' => json_encode(['#808080', '#000000', '#FFFFFF', '#FF0000']),
                'tags' => json_encode(['Men', 'Tops', 'Casual', 'Winter']),
                'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Formal Blazer',
                'price' => 119.99,
                'description' => 'Elegant blazer for formal occasions. Tailored fit with premium fabric for a sophisticated look. Features a two-button closure, notched lapels, and functional pockets. The high-quality lining ensures comfort, while the structured shoulders create a sharp silhouette.',
                'available_colors' => json_encode(['#000000', '#000080', '#808080']),
                'tags' => json_encode(['Men', 'Formal', 'Blazers', 'Business']),
                'image' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casual Denim Jacket',
                'price' => 79.99,
                'description' => 'A classic denim jacket with a modern twist. This versatile piece features a comfortable fit, button-up front, and multiple pockets. The washed denim gives it a lived-in look, while the durable construction ensures it will last for years to come.',
                'available_colors' => json_encode(['#1E90FF', '#000080', '#000000']),
                'tags' => json_encode(['Men', 'Outerwear', 'Casual', 'Denim']),
                'image' => 'https://images.unsplash.com/photo-1550246140-5119ae4790b8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Outerwear
            [
                'name' => 'Leather Jacket',
                'price' => 129.99,
                'description' => 'Classic leather jacket with a modern twist. Made from premium leather with a comfortable lining. The timeless design features a zip front, snap collar, and multiple pockets. This jacket adds an edge to any outfit while providing warmth and durability.',
                'available_colors' => json_encode(['#8B4513', '#000000']),
                'tags' => json_encode(['Unisex', 'Outerwear', 'Jackets', 'Winter']),
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Waterproof Rain Jacket',
                'price' => 89.99,
                'description' => 'Stay dry in style with this waterproof rain jacket. Features sealed seams, a breathable membrane, and adjustable hood and cuffs. The lightweight design makes it perfect for travel, while the durable water-repellent finish ensures long-lasting protection.',
                'available_colors' => json_encode(['#FFD700', '#000000', '#0000FF', '#FF0000']),
                'tags' => json_encode(['Unisex', 'Outerwear', 'Rain', 'Functional']),
                'image' => 'https://images.unsplash.com/photo-1545594861-3bef43ff2fc8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Footwear
            [
                'name' => 'Running Shoes',
                'price' => 89.99,
                'description' => 'Lightweight and responsive running shoes designed for comfort and performance. Features cushioned soles, breathable mesh upper, and supportive heel counter. The flexible outsole provides excellent traction, while the padded collar ensures a comfortable fit.',
                'available_colors' => json_encode(['#FF0000', '#000000', '#FFFFFF', '#00FF00']),
                'tags' => json_encode(['Unisex', 'Footwear', 'Athletic', 'Running']),
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leather Ankle Boots',
                'price' => 99.99,
                'description' => 'Stylish leather ankle boots that combine fashion and function. These versatile boots feature a side zipper for easy on/off, cushioned insole for all-day comfort, and a durable outsole for traction. The premium leather develops a beautiful patina over time.',
                'available_colors' => json_encode(['#8B4513', '#000000', '#A52A2A']),
                'tags' => json_encode(['Women', 'Footwear', 'Boots', 'Fall']),
                'image' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Accessories
            [
                'name' => 'Summer Hat',
                'price' => 29.99,
                'description' => 'Stylish and protective summer hat. Perfect for beach days and outdoor activities. The wide brim provides excellent sun protection, while the lightweight material keeps you cool. The adjustable chin strap ensures a secure fit even on windy days.',
                'available_colors' => json_encode(['#F5DEB3', '#FFFFFF', '#000000']),
                'tags' => json_encode(['Unisex', 'Accessories', 'Summer', 'Hats']),
                'image' => 'https://images.unsplash.com/photo-1533055640609-24b498dfd74c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leather Handbag',
                'price' => 89.99,
                'description' => 'Elegant leather handbag with a spacious interior and multiple compartments. The premium leather construction ensures durability, while the classic design complements any outfit. Features include a secure zip closure, interior pockets, and an adjustable shoulder strap.',
                'available_colors' => json_encode(['#8B4513', '#000000', '#A52A2A', '#F5F5DC']),
                'tags' => json_encode(['Women', 'Accessories', 'Bags', 'Leather']),
                'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Silk Scarf',
                'price' => 39.99,
                'description' => 'Luxurious silk scarf with a vibrant print. This versatile accessory can be worn in multiple ways - around your neck, as a headband, or tied to your handbag. The premium silk material feels soft against the skin and adds an elegant touch to any outfit.',
                'available_colors' => json_encode(['#FF69B4', '#4B0082', '#00BFFF', '#FF8C00']),
                'tags' => json_encode(['Women', 'Accessories', 'Scarves', 'Luxury']),
                'image' => 'https://images.unsplash.com/photo-1584030373081-49b9a4f38d75?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Classic Sunglasses',
                'price' => 59.99,
                'description' => 'Timeless sunglasses that combine style and protection. The polarized lenses reduce glare and provide 100% UV protection, while the durable frame ensures long-lasting wear. The classic design complements any face shape and adds a touch of sophistication to your look.',
                'available_colors' => json_encode(['#000000', '#8B4513', '#1E90FF']),
                'tags' => json_encode(['Unisex', 'Accessories', 'Eyewear', 'Summer']),
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Additional Products
            [
                'name' => 'Cozy Knit Sweater',
                'price' => 64.99,
                'description' => 'Stay warm and stylish with this cozy knit sweater. Made from a soft wool blend that provides warmth without bulk. The relaxed fit and classic design make it perfect for layering, while the ribbed cuffs and hem ensure a comfortable fit that retains its shape.',
                'available_colors' => json_encode(['#F5F5DC', '#808080', '#000000', '#8B4513']),
                'tags' => json_encode(['Unisex', 'Tops', 'Winter', 'Knitwear']),
                'image' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vintage Wristwatch',
                'price' => 149.99,
                'description' => 'A sophisticated vintage-inspired wristwatch that combines classic design with modern reliability. Features include a genuine leather strap, stainless steel case, and precise quartz movement. Water-resistant up to 30 meters, this timepiece is both functional and elegant.',
                'available_colors' => json_encode(['#8B4513', '#000000', '#C0C0C0']),
                'tags' => json_encode(['Unisex', 'Accessories', 'Watches', 'Luxury']),
                'image' => 'https://images.unsplash.com/photo-1539874754764-5a96559165b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);

        $this->command->info('Created ' . count($products) . ' products successfully!');
    }
}
