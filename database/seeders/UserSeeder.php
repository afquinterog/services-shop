<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'User Shop 1',
            'email' => 'user@shop1.test'
        ]);

        User::factory()->create([
            'name' => 'User Shop 2',
            'email' => 'user@shop2.test'
        ]);
    }
}
