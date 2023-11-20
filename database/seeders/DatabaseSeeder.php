<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'name' => 'david',
            'email' => 'test@mail.com',
            'image_path' => '/img',
            'phone_number' => '08123',
            'address' => 'Sleman',
            'job' => 'Owner',
            'username' => 'david',
            'password' => '12345678'
        ]);

    }
}
