<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codex extends Model
{
    protected $fillable = [
      'name',
      'type',
      'description',
    ];

    /** @use HasFactory<\Database\Factories\CodexFactory> */
    use HasFactory;
}
