<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departament;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $functie = ['director', 'manager', 'programator', 'expert marketing', 'web designer', 'economist'];
        return [
            'nume' => $this->faker->firstName(),
            'prenume' => $this->faker->lastName(),
            'departament_id' => Departament::inRandomOrder()->first(),
            'functie' => $functie[rand(0,5)],
            'cnp' => $this->faker->numberBetween(1234567890123, 2923456789012),
            'salariu' => ($this->faker->numberBetween(20,75) * 100) ,
            'zile_concediu' => $this->faker->numberBetween(21,30),
        ];
    }
}
