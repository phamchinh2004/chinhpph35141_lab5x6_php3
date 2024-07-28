<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AmNhac;
use App\Models\NhacSi;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AmNhac>
 */
class AmNhacFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AmNhac::class;
    public function definition(): array
    {
        return [
            'ten'=>$this->faker->name,
            'mo_ta'=>$this->faker->text(200),
            'id_nhac_si'=>NhacSi::inRandomOrder()->first()->id
        ];
    }
}
