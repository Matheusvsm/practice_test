<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Caminhao;
use App\Models\Modelo;
use App\Models\Motorista;
use App\Models\Transportadora;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caminhao>
 */
class CaminhaoFactory extends Factory
{
    protected $model = Caminhao::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'placa' => $this->faker->unique()->bothify('???-####'),
            'cor_caminhao' => $this->faker->colorName(),
            'modelo_id' => Modelo::factory(),
            'motorista_id' => Motorista::factory(),
        ];
    }
}
