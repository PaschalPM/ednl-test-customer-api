<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'telephone' => $this->faker->phoneNumber,
            'bvn' => $this->faker->numerify('###########'), // 11-digit BVN
            'dob' => $this->faker->date('Y-m-d'),
            'residential_address' => $this->faker->address,
            'state' => $this->faker->state,
            'bankcode' => $this->faker->numerify('###'), // 3-digit bank code
            'accountnumber' => $this->faker->numerify('##########'), // 10-digit account number
            'company_id' => Str::uuid(),
            'email' => $this->faker->unique()->safeEmail,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'id_card' => $this->faker->optional()->imageUrl(),
            'voters_card' => $this->faker->optional()->imageUrl(),
            'drivers_licence' => $this->faker->optional()->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
