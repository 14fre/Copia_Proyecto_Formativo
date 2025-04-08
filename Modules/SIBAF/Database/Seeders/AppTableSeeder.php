<?php

namespace Modules\SIBAF\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SICA\Entities\App;
use Illuminate\Database\Eloquent\Model;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Registro o actualización de la nueva aplicación para Estación de sibaf */
        $app = App::updateOrCreate(['name' => 'SIBAF'], [
            'url' => '/sibaf/index',
            'color' => '#76250C',
            'icon' => 'fas fa-phone',
            'description' => 'sistema de  solicitud  de bajas de formacion',
            'description_english' => 'training leave request system'
        ]);

       
    }
}
