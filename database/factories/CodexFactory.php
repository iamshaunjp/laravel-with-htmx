<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Codex>
 */
class CodexFactory extends Factory
{
    public function definition(): array
    {
      $type = $this->faker->randomElement(['character', 'item', 'location']);

      return [
        'name' => $this->faker->name(),
        'type' => $type,
        'description' => $this->faker->paragraph(2),
      ];
    }
}
