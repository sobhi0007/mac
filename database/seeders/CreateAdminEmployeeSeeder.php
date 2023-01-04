<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $employee = Employee::create([
            'name' => 'Super Admin',
            'email'=>'super-admin@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'Owner',
            'branch_id'=>1,
        ]);
      
        $role = Role::create(['name' => 'Owner']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $employee->assignRole([$role->id]);
    }
}