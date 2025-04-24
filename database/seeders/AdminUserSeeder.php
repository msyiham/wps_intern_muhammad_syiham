<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat user admin
        $admin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('123456'),
        ]);

        // Assign role admin
        $admin->assignRole($adminRole);
    }
}
