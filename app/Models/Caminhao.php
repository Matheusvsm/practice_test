<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'caminhoes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'placa',
        'cor_caminhao',
        'modelo_id',
        'motorista_id',
    ];

    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
}
