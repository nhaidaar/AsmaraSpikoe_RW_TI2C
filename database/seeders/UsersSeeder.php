<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'username' => 'ketuarw',
                'password' => Hash::make('12345'),
            ],
            [
                'user_id' => 2,
                'username' => 'ketuart',
                'password' => Hash::make('12345'),
            ],
            [
                'user_id' => 3,
                'username' => 'kartar',
                'password' => Hash::make('12345'),
            ],
        ];
        
        DB::table('users')->insert($data);
    }
}
