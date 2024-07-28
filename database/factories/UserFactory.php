<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make(1),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->numberBetween(1, 12),
            'address' => $this->faker->address,
        ];
    }
}
