<?php
namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'izena' => 'Admin',
            'abizena' => 'User',
            'email' => 'example@gmail.com',
            'password' => Hash::make('password'),
            'mota' => UserRole::admin,
        ]);
    }
}
