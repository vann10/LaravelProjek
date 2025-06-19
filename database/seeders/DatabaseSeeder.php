<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 1 user spesifik untuk login
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Buat 50 transaksi untuk user tersebut
        Transaction::factory(50)->create([
            'user_id' => $user->id
        ]);

        // Buat 5 user lain, masing-masing dengan 20 transaksi
        User::factory(5)->create()->each(function($u) {
            Transaction::factory(20)->create([
                'user_id' => $u->id
            ]);
        });
    }
}