<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'domicilio',
        'email',
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }
}
