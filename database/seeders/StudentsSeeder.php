<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 30; $i++)
        {
            User::query()->firstOrCreate([
                'account_no'    => 'studentaccount'.$i,
                'name'          => 'student '.$i.' account',
                'email'         => 'student'.$i.'@bgvlabs.com',
                'password'      => bcrypt('student'.$i.'password$$'),
                'account_type'  => 'student'
            ]);
        }
    }
}
