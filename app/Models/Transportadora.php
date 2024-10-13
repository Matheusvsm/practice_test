<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'transportadoras';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nome_transportadora',
        'cnpj_transportadora',
        'status_transportadora',
    ];

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'transportadora_motorista');
    }
}
