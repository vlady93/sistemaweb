<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use  Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;                                               

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1= Role::create(['name'=>'Admin']);
        $role2= Role::create(['name'=>'Logistic']);
        $role3= Role::create(['name'=>'Obreros']);

        Permission::create(['name'=>'categories.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categories.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categories.edit'])->syncRoles([$role1,$role2]);
        
    }
}
