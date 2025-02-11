<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $login = [  
            ["username" => "Akbar", "password" => Hash::make('ABC123'), "level" => "admin"],
            ["username" => "Angga", "password" => Hash::make('123ABC'), "level" => "user"],
        ];
        Login::insert($login);
    }
}
