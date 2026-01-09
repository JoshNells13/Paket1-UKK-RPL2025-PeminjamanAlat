<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $peminjamRole = Role::where('name', 'peminjam')->first();
        $petugasRole  = Role::where('name', 'petugas')->first();
        $adminRole    = Role::where('name', 'admin')->first();

        User::create([
            'name'     => 'Petugas Satu',
            'username' => 'petugas1',
            'password' => Hash::make('password'),
            'role_id'  => $petugasRole->id,
        ]);

        // 3 ADMIN
        User::create([
            'name'     => 'Admin Satu',
            'username' => 'admin1',
            'password' => Hash::make('password'),
            'role_id'  => $adminRole->id,
        ]);


    }
}
