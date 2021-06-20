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
            'name' => 'Admin',
            'email' => 'admin@gmail.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Siswa');

        $user = User::create([
            'name' => 'Guru',
            'email' => 'guru@gmail.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Guru');
    }
}
