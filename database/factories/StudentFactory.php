<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    private static $number = 0;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $studIDPref = ['01'=>'MA','02'=>'OB','03'=>'PA','04'=>'SJ',
        '05'=>'SM','06'=>'BO','07'=>'SR','08'=>'AN'];
        $cNumber = "0".strval($this->faker->numberBetween(1,8));
        $randomSY = $this->faker->numberBetween(16,22);
        $program = $this->faker->randomElement(['BSOM','BSIS','BSAIS','BTVTED','ACT','COMSEC','HRS', 'ABM', 'GAS']);
        $yearLevel = $program == 'ABM' || $program == 'GAS' ? $this->faker->numberBetween(11,12) : $this->faker->numberBetween(1,4);
        return [
            'studentID' => $studIDPref[$cNumber].'-'.$randomSY.strval($cNumber).strval(sprintf('%04d',self::$number++)),
            'firstName' => $this->faker->firstName($gender = 'male'|'female'),
            'middleName' => $this->faker->lastName(),
            'lastName' => $this->faker->lastName(),
            'program' => $program,
            'yearLevel' => $yearLevel,
            'section' => strtoupper($this->faker->randomLetter()),
            'birthDate' => $this->faker->date('Y-m-d')
        ];
    }
}
