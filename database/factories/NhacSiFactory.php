<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NhacSi;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhacSi>
 */
class NhacSiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = NhacSi::class;
    public function definition(): array
    {
        return [
            'ten'=>$this->faker->name,
            'ngay_sinh'=>$this->faker->date,
            'que_quan'=>$this->faker->city,
        ];
    }
}
