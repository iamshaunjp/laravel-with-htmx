<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Codex;

class CodexSeeder extends Seeder
{
    public function run(): void
    {
      Codex::factory()->count(5)->create();

      Codex::create([
        'name' => 'Tash',
        'type' => 'character',
        'description' => 'A troubled young man caught between worlds.',
      ]);
      Codex::create([
        'name' => 'The Obsidian Blade',
        'type' => 'item',
        'description' => 'A legendary weapon lost to myth.',
      ]);
      Codex::create([
        'name' => 'The Pale Halls',
        'type' => 'location',
        'description' => 'An ancient fortress where destinies change.',
      ]);
    }
}
