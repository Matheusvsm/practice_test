<?php

namespace Tests\Unit;

use App\Models\Transportadora;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransportadoraTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_transportadora(): void
    {
        // $response = $this->postJson('/api/transportadoras', [
        //     'nome_transportadora' => 'Transportadora Test',
        //     'cnpj_transportadora' => '12.345.678/0001-95',
        //     'status_transportadora' => 1,
        // ]);

        // $response->assertStatus(201);
        // $this->assertCount(1, Transportadora::all());
    }
}
