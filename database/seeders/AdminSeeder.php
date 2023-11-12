<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([ 
            'fullname' => 'Andre Aditya',
            'email' => 'andreaditya123@gmail.com',
            'username' => 'admin',
            'password' => 'admin',
            'address' => 'Kab. Sidoarjo',
            'isAdmin' => 1
        ]);
    }
}
