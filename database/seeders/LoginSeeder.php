<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['first_name'=>'admin','last_name'=>'test','mobile_number'=>'123456', 'email'=>'admin@dev.com', 'password'=>'123456']);
        
        /*==================== ADMIN  ====================*/
        Role::create(['name'=>'Super Admin', 'guard_name'=>'admin']);
        Role::create(['name'=>'Admin', 'guard_name'=>'admin']);
        /*==================== SELLER  ====================*/
        Role::create(['name'=>'seller', 'guard_name'=>'seller']);

        /*==================== ADMIN  ====================*/
        Permission::create(['name'=>'Cretae Role', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Read Roles', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Update Role', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Delete Role', 'guard_name'=>'admin']);
        
        Permission::create(['name'=>'Cretae permission', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Read permissions', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Update permission', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Delete permission', 'guard_name'=>'admin']);

        Permission::create(['name'=>'Cretae admin', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Read admins', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Update admin', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Delete admin', 'guard_name'=>'admin']);

        Permission::create(['name'=>'Cretae Seller', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Read Sellers', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Update Seller', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Delete Seller', 'guard_name'=>'admin']);

        Permission::create(['name'=>'Cretae User', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Read Users', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Update User', 'guard_name'=>'admin']);
        Permission::create(['name'=>'Delete User', 'guard_name'=>'admin']);

    }
}
