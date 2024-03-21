<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('a'),
                'level' => 1
            ],
            [
                'name' => 'dadang',
                'email' => 'dadang@gmail.com',
                'password' => bcrypt('a'),
                'level' => 2
            ],
            [
                'name' => 'faisal',
                'email' => 'faisal@gmail.com',
                'password' => bcrypt('a'),
                'level' => 3
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
