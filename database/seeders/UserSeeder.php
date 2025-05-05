<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create regular users
        $users = [
            [
                'name' => 'John Smith',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Emily Wilson',
                'email' => 'emily@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'David Thompson',
                'email' => 'david@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jessica Martinez',
                'email' => 'jessica@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Robert Johnson',
                'email' => 'robert@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jennifer Davis',
                'email' => 'jennifer@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'William Miller',
                'email' => 'william@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Elizabeth Wilson',
                'email' => 'elizabeth@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'James Taylor',
                'email' => 'james@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Patricia Anderson',
                'email' => 'patricia@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Richard Thomas',
                'email' => 'richard@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Linda Jackson',
                'email' => 'linda@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Charles White',
                'email' => 'charles@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => $user['password'],
                'remember_token' => Str::random(10),
                'is_admin' => $user['is_admin'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Created 1 admin user and ' . count($users) . ' regular users.');
    }
}
