<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Subject;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'];

        foreach ($subjects as $subject)
        {
            Subject::query()->firstOrCreate([
                'name'          => $subject,
                'name_slug'     => Str::slug($subject),
                'description'   => 'descriptionnnnnnnnn'
            ]);
        }
    }
}
