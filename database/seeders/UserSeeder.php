<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'jurnalist',
                'password' => Hash::make('asd'),
                'role' => 'jurnalist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'editor',
                'password' => Hash::make('asd'),
                'role' => 'editor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'cititor',
                'password' => Hash::make('asd'),
                'role' => 'cititor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
