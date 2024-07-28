<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\Sach;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sach>
 */
class SachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sach::class;
    public function definition(): array
    {
        return [
            'ten'=>$this->faker->name,
            'anh'=>$this->faker->text(100),
            'ngay_xuat_ban'=>$this->faker->date,
            'tac_gia'=>$this->faker->city,
            'so_luong'=>$this->faker->numberBetween(1,100)
        ];
    }
}
