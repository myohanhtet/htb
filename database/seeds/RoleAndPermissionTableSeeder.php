<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
        ->forgetCachedPermissions();

        $json = file_get_contents(storage_path('permission.json'));

        $objs = json_decode($json,true);

        foreach ($objs as $obj) {
            foreach ($obj as $key => $value) {
                $insertArr[$key] = $value;
            }
            Permission::create($insertArr);
        }

        Role::create(['name'=>'superuser','guard_name' =>'web'])->givePermissionTo(Permission::all());

        Role::create(['name'=>'admin','guard_name'=>'web'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'user', 'guard_name'=>'web'])->givePermissionTo(Permission::all());

    }
}
