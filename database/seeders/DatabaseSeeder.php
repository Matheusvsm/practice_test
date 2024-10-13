<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Caminhao;
use App\Models\Modelo;
use App\Models\Motorista;
use App\Models\Transportadora;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $transportadoras = Transportadora::factory()->count(5)->create();
        $motoristas = Motorista::factory()->count(10)->create();

        // Associar motoristas a transportadoras aleatoriamente
        foreach ($motoristas as $motorista) {
            $transportadora = $transportadoras->random();
            $transportadora->motoristas()->attach($motorista->id);
        }

        Modelo::factory(5)->create();

        Caminhao::factory(30)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
