<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TiketFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      //
      'price' => $this->faker->randomDigit(),
      'id_concert' => mt_rand(0, 3),
      'id_user' => mt_rand(0, 3),
      'is_user' => "0"
    ];
  }
}
