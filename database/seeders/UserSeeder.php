<?php

namespace Database\Seeders;

use App\Models\Sales\SalesType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table("users")->insert([
            [
                "name"          => "Mahmoud Gad",
                "email"         => "mahmoudeng50@gmail.com",
                "password"      => Hash::make("123456789"),
                "phone"         => "01111111111",
                "profile_image" => "uploads\user\avatar1.png",
                "created_at"    => now(),
                "updated_at"    => null
            ],
        ]);
    }
}
