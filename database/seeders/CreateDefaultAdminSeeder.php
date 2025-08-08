<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateDefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@tonsaeay.com')->first();
        if(!$admin) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@tonsaeay.com',
                'username' => 'admin',
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'key' => (string) Str::uuid(),
            ]);
        }
    }
}
