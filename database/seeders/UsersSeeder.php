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
                'user_id'   => 1,
                'level'     => 'rw',
                'username'  => 'ketuarw',
                'password'  => Hash::make('12345'),
                'warga_id'  => 1
            ],
            [
                'user_id'   => 2,
                'level'     => 'rt',
                'username'  => 'ketuart',
                'password'  => Hash::make('12345'),
                'warga_id'  => 2
            ],
            [
                'user_id'   => 3,
                'level'     => 'karang_taruna',
                'username'  => 'kartar',
                'password'  => Hash::make('12345'),
                'warga_id'  => 1
            ],
        ];
        
        DB::table('users')->insert($data);
    }
}
