<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->permissionCreate();
    }

    public function permissionCreate()
    {
        DB::table('ck_permissions')->insert([
            'name' => 'Admin '
        ]);
        DB::table('ck_permissions')->insert([
            'name' => 'Operator' 
        ]);
    }
}
