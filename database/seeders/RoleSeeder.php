<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role1 = Role::create(['name'=>'Admin']);

        $permissionsOfRoles = [
            'roles.index',
            'roles.store',
            'roles.create',
            'roles.show', 
            'roles.update',
            'roles.destroy',
            'roles.edit',
        ];

        foreach($permissionsOfRoles as $perRole){
            Permission::create(['name' => $perRole])->assignRole($role1);
        }
        
    }
}
