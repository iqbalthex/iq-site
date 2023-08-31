<?php

namespace Database\Seeders;

use App\Models\ {
  Classroom,
  FormativeScore,
  Student,
  Subject,
  SubjectTeacher,
  Teacher,
};
use Illuminate\Database\Seeder;

class RaportSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            Classroom::create([
                'code'  => "CLS_1000$i",
                'class' => mt_rand(1, 6),
            ]);
        }

        Subject::factory(15)->create();
        Teacher::factory(10)->create();
        Student::factory(20)->create();
        FormativeScore::factory(30)->create();

        SubjectTeacher::factory(10)->create();
    }
}
