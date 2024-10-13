<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'motoristas';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nome_motorista',
        'cpf_motorista',
        'data_nascimento_motorista',
        'email_motorista',
    ];

    public function transportadoras()
    {
        return $this->belongsToMany(Transportadora::class, 'transportadora_motorista');
    }

    public function caminhoes()
    {
        return $this->hasMany(Caminhao::class);
    }
}
