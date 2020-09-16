<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser();
    }

    public function createUser()
    {
        DB::table('ck_users')->insert([
            'name' => 'user-teste', 
            'email' => 'email@gmail.com.br',
            'password' => Hash::make('@user_'), 
            'login'=>'user', 
            'permission'=> 1,
           
        ]);
    }
}
