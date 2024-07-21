<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
////         \App\Models\User::factory()->create([
//
//
//         \App\Models\User::factory(5)->create();
//         \App\Models\Category::factory(5)->create();
//         \App\Models\Product::factory(5)->create();
         \App\Models\Policy::factory(5)->create();



    }
}
