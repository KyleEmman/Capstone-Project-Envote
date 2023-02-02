<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Officer>
 */
class OfficerFactory extends Factory
{
    private static $number = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'Sg_Officer'.strval(self::$number++)."@2022",
            'password' => bcrypt('officer_BPC1971'),
            'firstName' => $this->faker->firstName($gender = 'male'|'female'),
            'lastName' => $this->faker->lastName(),
        ];
    }
}
