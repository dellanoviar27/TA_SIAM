<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = User::firstOrCreate([
            'name'=>'staff',
            'email'=>'staff@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $staff->assignRole('staff');

        $teacher = User::firstOrCreate([
            'name'=>'teacher',
            'email'=>'teacher@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $teacher->assignRole('teacher');

        $student = User::firstOrCreate([
            'name'=>'student',
            'email'=>'student@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $student->assignRole('student');
    }
}
