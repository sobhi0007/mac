<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Permissions
      $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'branch-list',
        'branch-create',
        'branch-edit',
        'branch-delete',
        'employee-list',
        'employee-create',
        'employee-edit',
        'employee-delete',
        'client-list',
        'client-create',
        'client-edit',
        'client-delete',
    ];
   
    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }
    }
}
