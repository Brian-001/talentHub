<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Role::create(['name' => 'Admin']);
        // Role::create(['name' => 'Employee']);
        // Role::create(['name' => 'Employer']);
        // Role::create(['name' => 'GovtStaff']);

        $admin = Role::where('name', 'Admin')->first();
        $admin->permissions()->attach(Permission::all());

        $employee = Role::where('name', 'Employee')->first();
        $employee->permissions()->attach(Permission::whereIn('name', ['create-employee', 'view-employee',
        'update-employee', 'delete-employee'])->get());

        $employer = Role::where('name', 'Employer')->first();
        $employer->permissions()->attach(Permission::whereIn('name', ['create-employer', 'view-employer', 
        'update-employer', 'delete-employer', 'hire-employee'])->get());

        $govtStaff = Role::where('name', 'GovtStaff')->first();
        $govtStaff->permissions()->attach(Permission::whereIn('name', ['approve-employee'])->get());
    }
}
