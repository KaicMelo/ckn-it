<?php

use Illuminate\Database\Seeder;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->colaboratorCreate();
    }

    public function colaboratorCreate()
    {
        DB::table('ck_collaborator')->insert([
            'name' => 'Kaic ',
            'admission_date' => date('Y-m-d'),
            'occupation' => 'Dev Junior',
            'cpf' => '42845859830',
            'rg' => '372212980 ',
            'photo' => 'photo.png' ,
        ]);
        DB::table('ck_collaborator')->insert([
            'name' => 'Marcos ',
            'admission_date' => date('Y-m-d'),
            'occupation' => 'Dev Senior',
            'cpf' => '59856320120',
            'rg' => '365254120 ',
            'photo' => 'photo.png' ,
        ]);
    }
}
