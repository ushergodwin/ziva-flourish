<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'thezivafkourish@gmail.com'], [
            'name' => 'Ziva Admin',
            'email' => 'thezivaflourish@gmail.com',
            'password' => Hash::make(env('ADMIN_PASSWORD',)),
            'email_verified_at' => now(),
        ]);

        // page settings seeder
        $this->call(PageSettingSeeder::class);
    }
}