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
        \App\Models\User::create([
            'name' => 'iqbal',
            'email' => 'iqbal@gmail.com',
            'password' => '123',
            'role' => 'admin',
        ]);

        \App\Models\User::factory(10)->create();

        $this->call([
            RaportSeeder::class,
        ]);        
    }
}
