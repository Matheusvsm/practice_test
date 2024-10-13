<?php

namespace Database\Factories;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeloFactory extends Factory
{
    protected $model = Modelo::class;

    public function definition()
    {
        return [
            'nome_modelo' => $this->faker->word(),
        ];
    }
}
