<?php

namespace Database\Seeders;

use App\Models\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovtStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::factory()->create([
        //     'name' => 'GovtStaff',
        //     'email' => 'govtstaff@gmail.com',
        //     'password' => bcrypt('govtstaff12345678'),
        //     'role' => Role::GovtStaff->value,
        // ]);
    }
}
