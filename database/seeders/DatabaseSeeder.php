<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cliente::factory(20)->create();
        User::factory(20)->create();
        User::factory()->create([
            'name' => 'Rui Guerra',
            'level'=>'admin',
            'email' => 'admin@gmail.com',
        ]);
    }
}
