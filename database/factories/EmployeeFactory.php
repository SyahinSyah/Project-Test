<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $this->faker->randomDigit,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->randomDigit
        ];
    }
}
