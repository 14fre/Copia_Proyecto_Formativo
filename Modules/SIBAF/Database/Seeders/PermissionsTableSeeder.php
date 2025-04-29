<?php

namespace Modules\SIBAF\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SICA\Entities\App;
use Modules\SICA\Entities\Permission;
use Modules\SICA\Entities\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear una lista de permisos para el rol 
        $permissions_admin = []; // Lista de permisos para el rol de administrador
        $permissions_soporte = [];
        // Consultar aplicación SICA para registrar los roles
        $app = App::where('name', 'SIBAF')->first();


        // Vista de configuración (Administrador)
        $permission = Permission::updateOrCreate(['slug' => 'sibaf.admin.welcome'], [ // Registro o actualización de permiso
            'name' => 'Acceso al Rol de Administrador',
            'description' => 'Acceso al Rol de Administrador',
            'description_english' => 'Access to the Administrator Role',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id; // Almacenar permiso para rol

     

        // Consulta de ROLES
        $rol_admin = Role::where('slug', 'sibaf.admin')->first(); // Rol Administrador
       
        // Asignación de PERMISOS para los ROLES de la aplicación AGROSOFT (Sincronización de las relaciones sin eliminar las relaciones existentes)
        $rol_admin->permissions()->syncWithoutDetaching($permissions_admin);


        // asignación de permisos para el rol de soporte
        $permissions_soporte = []; // Lista de permisos para el rol de soporte  
        
        
         // Consultar aplicación SICA para registrar los roles
         $app = App::where('name', 'SIBAF')->first();
          // Vista de configuración (Soporte)
         $permission = Permission::updateOrCreate(['slug' => 'sibaf.soporte.welcomesoporte'], [ // Registro o actualización de permiso
             'name' => 'Acceso al Rol de soporte',
             'description' => 'Acceso al Rol de soporte',
             'description_english' => 'Access to the support role',
             'app_id' => $app->id
         ]);
         $permissions_soporte[] = $permission->id; // Almacenar permiso para rol
 
      
 
         // Consulta de ROLES
         $rol_soporte = Role::where('slug', 'sibaf.soporte')->first(); // Rol Soporte
        
 
         // Asignación de PERMISOS para los ROLES de la aplicación AGROSOFT (Sincronización de las relaciones sin eliminar las relaciones existentes)
         $rol_soporte->permissions()->syncWithoutDetaching($permissions_soporte);
 

      
    }
}