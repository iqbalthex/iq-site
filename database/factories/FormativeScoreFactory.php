<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class FormativeScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'classroom_id' => mt_rand(1, 6),
            'student_id' => mt_rand(1, 20),
            'subject_id' => mt_rand(1, 15),
            'scores' => json_encode([
                mt_rand(70, 100),
                mt_rand(70, 100),
                mt_rand(70, 100),
            ]),
        ];
    }
}
