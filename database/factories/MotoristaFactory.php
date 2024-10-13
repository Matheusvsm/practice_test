<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Motorista;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorista>
 */
class MotoristaFactory extends Factory
{
    protected $model = Motorista::class;

    public function definition()
    {
        return [
            'nome_motorista' => $this->faker->name(),
            'cpf_motorista' => $this->faker->numerify('###########'),
            'data_nascimento_motorista' => $this->faker->date(),
            'email_motorista' => $this->faker->safeEmail(),
        ];
    }
}
