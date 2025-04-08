<?php

namespace Modules\SIBAF\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\SICA\Entities\Person;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $person = Person::where('document_number', 1029880871)->first();
        User::updateOrCreate(['nickname' => 'BREINERLLANOS'], [
            'person_id' => $person->id,
            'email' => 'breinerjosellanoslopez@gmail.com' //Brll0871
        ]);
    }
}