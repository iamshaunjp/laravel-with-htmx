<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{

  public function definition(): array
  {
      static $order = 1;
      return [
          'title' => $this->faker->sentence(3),
          'description' => $this->faker->paragraph(10),
          'order' => $order++,
      ];
  }

}