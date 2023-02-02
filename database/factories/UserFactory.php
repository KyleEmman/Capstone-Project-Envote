<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    private static $number = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $skip = self::$number++;
        $student = Student::orderBy('lastName', 'DESC')->get()->skip($skip)->first();
        return [
            'studentID' => $student,
            'password' => bcrypt('password123'), // password
            'firstName' => $student->firstName,
            'middleName' => $student->middleName,
            'lastName' => $student->lastName,
            'program' => $student->program,
            'yearLevel' => $student->yearLevel,
            'section' => $student->section,
            'birthDate' => $student->birthDate,
            'remember_token' => Str::random(10),
            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
