<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $permission1 = Permission::create(['name' => 'edit']);
        $permission2 = Permission::create(['name' => 'delete']);
        $permission3 = Permission::create(['name' => 'view']);
        $role1 = Role::create([
            'id' => 1,
            'name' => 'adminmaster',
            'keterangan' => 'hak akses sebagai Admin Master'
        ]);
        $role1->givePermissionTo($permission1);
        $permission1->assignRole($role1);
        $role1->givePermissionTo($permission2);
        $permission2->assignRole($role1);
        $role1->givePermissionTo($permission3);
        $permission3->assignRole($role1);

        $role2= Role::create([
            'id' => 2,
            'name' => 'operator',
            'keterangan' => 'hak akses sebagai Operator'
        ]);
        $role2->givePermissionTo($permission1);
        $permission1->assignRole($role2);
        $role2->givePermissionTo($permission3);
        $permission3->assignRole($role2);

        $role3 = Role::create([
            'id' => 3,
            'name' => 'kepaladinas',
            'keterangan' => 'hak akses sebagai Kepala Bidang'
        ]);
        $role3->givePermissionTo($permission3);
        $permission3->assignRole($role3);

        $role4 = Role::create([
            'id' => 4,
            'name' => 'kepalabidang',
            'keterangan' => 'Hak akses sebagai Kepala Bidang'
        ]);
        $role4->givePermissionTo($permission3);
        $permission3->assignRole($role4);

        $role5 = Role::create([
            'id' => 5,
            'name' => 'kepalaseksi',
            'keterangan' => 'Hak akses sebagai Kepala Seksi'
        ]);
        $role5->givePermissionTo($permission3);
        $permission3->assignRole($role5);

        $role6 = Role::create([
            'id' => 6,
            'name' => 'pegawai',
            'keterangan' => 'Hak akses sebagai Pegawai PNS/Non PNS'
        ]);
        $role6->givePermissionTo($permission3);
        $permission3->assignRole($role6);

    }
}
