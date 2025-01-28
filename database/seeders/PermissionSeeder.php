<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'create-user', 'view-user', 'update-user', 'delete-user', 
            'create-employee', 'view-employee', 'update-employee', 'delete-employee',
            'hire-employee', 'approve-employee'
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name'=> $permission]);
        }
    }
}
