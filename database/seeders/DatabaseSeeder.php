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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('bpsdmp')
        ]);

        \App\Models\Post::create([
            'user_id' => '99e28df0-fd6c-49fd-aebf-3a585db93bad',
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, nulla aliquam. Totam blanditiis esse eius unde maiores facilis, quaerat praesentium, ducimus quasi quisquam officiis quia debitis quae sed sint impedit!',
        ]);
    }
}
