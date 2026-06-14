<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin@ai-solutions.co.uk'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('Admin@2025'),
            ]
        );
    }
}
