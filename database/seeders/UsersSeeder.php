<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'teacher', 'student'];
        $index = 0;

        foreach ($roles as $role)
        {
            $index += 1;

            User::query()->create([
                'account_no'    => $role.$index,
                'name'          => $role.' account',
                'email'         => $role.'@bgvlabs.com',
                'password'      => bcrypt($role.'password$$'),
                'account_type'  => $role
            ]);
        }
    }
}
