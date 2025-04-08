<?php

namespace Modules\SIBAF\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\SICA\Entities\App;
use Modules\SICA\Entities\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $app = App::where('name', 'SIBAF')->firstOrFail();

        $roladmin = Role::updateOrCreate(['slug' => 'sibaf.admin'], [
            'name' => 'Administrador',
            'description' => 'Rol administrador de la aplicación AGROSOFT',
            'description_english' => 'AGROSOFT application administrator role',
            'full_access' => 'No',
            'app_id' => $app->id
        ]);

        $useradministrador = User::where('nickname', 'BREINERLLANOS')->firstOrFail();

        $useradministrador->roles()->syncWithoutDetaching([$roladmin->id]);
    }
}