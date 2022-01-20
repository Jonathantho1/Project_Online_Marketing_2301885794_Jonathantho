<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'gender' => 'male',
            'address' => 'the company',
            'email' => 'admin@dyid.com',
            'password' => Hash::make('admin')
        ]);
    }
}
