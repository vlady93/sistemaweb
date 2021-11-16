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
        $role1= Role::create(['name'=>'Administrador']);
        $role2= Role::create(['name'=>'Logistica']);
        $role3= Role::create(['name'=>'Obreros']);

        Permission::create(['name'=>'ver-categoria'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-categoria'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-categoria'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-categoria'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-categoria'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-proveedor'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name'=>'ver-ciudad'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-ciudad'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-ciudad'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-ciudad'])->syncRoles([$role1,$role2]);

        
        Permission::create(['name'=>'ver-cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-cliente'])->syncRoles([$role1,$role2]);

        
        Permission::create(['name'=>'ver-usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'crear-usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'editar-usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'detalle-usuario'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-usuario'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'ver-rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'crearrol'])->syncRoles([$role1]);
        Permission::create(['name'=>'editar-rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'detalle-rol'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-rol'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'ver-proyecto'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-proyecto'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-proyecto'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-proyecto'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-proyecto'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'pdf-proyecto'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-salida-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-salida-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-salida-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-salida-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-salida-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'pdf-salida-material'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-ingreso-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-ingreso-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-ingreso-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-ingreso-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-ingreso-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'pdf-ingreso-material'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'editar-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'detalle-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'borrar-material'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'pdf-material'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-reporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-reporte'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'ver-imagen'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'crear-imagen'])->syncRoles([$role1,$role2]);
        

        


        
    }
}
