<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin  = DB::table('roles')->insert([
            'name' => 'super_admin' ,
            'display_name'=>'super admin' ,
            'description' =>'Can  Do anything in The Project'
        ]);

        $user  = DB::table('roles')->insert([
            'name' => 'user' ,
            'display_name'=>'user' ,
            'description' =>'Can  Do specific tasks'
        ]);


    } // End Run Function


} // End RolesTableSeeder Controller
