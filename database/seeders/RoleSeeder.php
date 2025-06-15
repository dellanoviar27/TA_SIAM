<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::firstOrCreate(['name' => 'tambah-user']);
        // Permission::firstOrCreate(['name' => 'edit-user']);
        // Permission::firstOrCreate(['name' => 'hapus-user']);
        // Permission::firstOrCreate(['name' => 'lihat-user']);

        // Permission::firstOrCreate(['name' => 'tambah-teacher']);
        // Permission::firstOrCreate(['name' => 'edit-teacher']);
        // Permission::firstOrCreate(['name' => 'hapus-teacher']);
        // Permission::firstOrCreate(['name' => 'lihat-teacher']);

        // Permission::firstOrCreate(['name' => 'tambah-student']);
        // Permission::firstOrCreate(['name' => 'edit-student']);
        // Permission::firstOrCreate(['name' => 'hapus-student']);
        // Permission::firstOrCreate(['name' => 'lihat-student']);

        // foreach ($permissions as $permission) {
        //     Permission::firstOrCreate(
        //         ['name' => $permission, 'guard_name' => 'web']
        //     );
        // }

        // $role = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'web']);
        // $role = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        // $role = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);

        $role = Role::create(['name' => 'staff']);
        $role = Role::create(['name' => 'teacher']);
        $role = Role::create(['name' => 'student']);

        // $roleStaff = Role::findByName('staff');
        // $roleStaff->givePermissionTo('tambah-user');
        // $roleStaff->givePermissionTo('edit-user');
        // $roleStaff->givePermissionTo('hapus-user');
        // $roleStaff->givePermissionTo('lihat-user');

        // $roleTeacher = Role::findByName('teacher');
        // $roleTeacher->givePermissionTo('tambah-teacher');
        // $roleTeacher->givePermissionTo('edit-teacher');
        // $roleTeacher->givePermissionTo('hapus-teacher');
        // $roleTeacher->givePermissionTo('lihat-teacher');

        // $roleStudent = Role::findByName('student');
        // $roleStudent->givePermissionTo('tambah-student');
        // $roleStudent->givePermissionTo('edit-student');
        // $roleStudent->givePermissionTo('hapus-student');
        // $roleStudent->givePermissionTo('lihat-student');
    }

    // public function run(): void
    // {
    //     //
    //     $role = Role::create(['name' => 'staff']);
    //     $role = Role::create(['name' => 'student']);
    //     $role = Role::create(['name' => 'teacher']);
    // }
}
