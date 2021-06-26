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
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'id' => '1606028',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Siswa');

        $user = User::create([
            'id' => '991606028',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Ortu');

        $user = User::create([
            'id' => '22222222',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Guru');
    }
}
