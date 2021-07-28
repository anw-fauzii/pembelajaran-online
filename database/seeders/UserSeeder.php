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
        $admin = User::create([
            'id' => '11111111',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('Admin');
    }
}
