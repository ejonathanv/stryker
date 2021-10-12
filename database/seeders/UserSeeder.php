<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Jonathan',
            'last_name' => 'Velazquez',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => \Hash::make('admin357')
        ]);

        User::factory()->create([
            'first_name' => 'Agente',
            'last_name' => 'Uno',
            'email' => 'stryker@proteusconsulting.com',
            'role' => 'admin',
            'password' => \Hash::make('Stryk3r@357')
        ]);

        User::factory()->create([
            'first_name' => 'Agente',
            'last_name' => 'Dos',
            'email' => 'vabaroa@proteusconsulting.com',
            'role' => 'admin',
            'password' => \Hash::make('Stryk3r@357')
        ]);
    }
}
