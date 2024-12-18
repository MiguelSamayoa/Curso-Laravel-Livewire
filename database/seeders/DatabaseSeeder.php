<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create( ['email'=> 'mikysama1234@gmail.com', "password"=>'Contraseña'] );
        \App\Models\User::factory(10)->create();

        \App\Models\Category::factory(10)
            ->hasThreads(10)
            ->create();

        \App\Models\Reply::factory(200)->create();
    }
}