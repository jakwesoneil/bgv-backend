<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 30; $i++)
        {
            User::query()->firstOrCreate([
                'account_no'    => 'teacheraccount'.$i,
                'name'          => 'teacher '.$i.' account',
                'email'         => 'teacher'.$i.'@bgvlabs.com',
                'password'      => bcrypt('teacher'.$i.'password$$'),
                'account_type'  => 'teacher'
            ]);
        }
    }
}
