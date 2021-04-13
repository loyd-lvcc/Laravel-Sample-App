<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Loyd Larazo',
            'email' => 'loyd.larazo@gmail.com'
        ], [
            'password' => Hash::make('secret123')
        ]);

        User::firstOrCreate([
            'name' => 'Emma Watson',
            'email' => 'emma.watson@gmail.com'
        ], [
            'password' => Hash::make('secret123')
        ]);
    }
}
