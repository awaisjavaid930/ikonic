<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        
        Permission::create(['name' => 'product.index']);
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.store']);
        Permission::create(['name' => 'product.edit']);
        Permission::create(['name' => 'product.update']);
        Permission::create(['name' => 'product.destroy']);
        
        $admin->givePermissionTo([
            'product.index','product.create','product.store','product.edit','product.update' 
        ]);
        
                
        $user->givePermissionTo([
            'product.index','product.create','product.store','product.edit','product.update' 
        ]);

    }
}
