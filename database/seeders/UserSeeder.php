<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('11223344'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ali cyber',
                'email' => 'ali.cyber@mail.com',
                'email_verified_at' => null,
                'password' => Hash::make('11223344'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
