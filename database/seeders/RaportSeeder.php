<?php

namespace Database\Seeders;

use App\Models\ {
  Classroom,
  FormativeScore,
  Teacher,
  Student,
  Subject,
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
            Classroom::create([ 'code' => "CLS_1000$i" ]);
        }

        Subject::factory(15)->create();
        Teacher::factory(5)->create();
        Student::factory(20)->create();
        FormativeScore::factory(30)->create();
    }
}
