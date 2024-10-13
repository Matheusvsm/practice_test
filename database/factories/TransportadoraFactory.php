<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transportadora;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportadora>
 */
class TransportadoraFactory extends Factory
{
    protected $model = Transportadora::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_transportadora' => $this->faker->company(),
            'cnpj_transportadora' => $this->faker->numerify('##############'),
            'status_transportadora' => $this->faker->randomElement([0, 1]),
        ];
    }
}
