<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncatePermissionTables();

        $config = config('kubpro.permission.role_structure');

        $mapPermission = collect(config('kubpro.permission.permissions_map'));

        foreach ($config as $key => $modules){
            $role = \App\Models\Role::create([
                'name' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            foreach ($modules as $module => $value){
                foreach (explode(',', $value) as $p => $perm){

                    $permissionValue = $mapPermission->get($perm);

                    $permissions [] = \App\Models\Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            $role->syncPermissions($permissions);



            $user = \App\Models\User::create([
                'name'  => 'John Doe',
                'username'   => str_replace('_', ' ', $key),
                'email'      => str_replace('_', ' ', $key).'@kubpro.com',
                'phone'      => rand(905000000000,905500000000),
                'password'   => \Illuminate\Support\Facades\Hash::make(str_replace('_', ' ', $key)),
                'enabled'    => 1,
            ]);

            $user->assignRole($role->name);
        }
    }

    public function truncatePermissionTables(){
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();
        foreach (config('permission.table_names') as $table){
            DB::table($table)->truncate();
        }
        \App\Models\User::truncate();
        \App\Models\Role::truncate();
        \App\Models\Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
