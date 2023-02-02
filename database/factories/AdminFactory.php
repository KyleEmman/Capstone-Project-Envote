<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    private static $number = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'BPC_Envote@2022_'.strval(self::$number++),
            'password' => bcrypt('admin_BPC1971'),
            'firstName' => $this->faker->firstName($gender = 'male'|'female'),
            'lastName' => $this->faker->lastName(),
        ];
    }
}
