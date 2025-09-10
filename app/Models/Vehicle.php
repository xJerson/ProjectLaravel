<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'año_fabricacion',
        'nombre_cliente',
        'apellidos_cliente',
        'documento_cliente',
        'correo_cliente',
        'telefono_cliente'
    ];

    // Accessor para mostrar el nombre completo del cliente
    public function getNombreCompletoAttribute()
    {
        return $this->nombre_cliente . ' ' . $this->apellidos_cliente;
    }

    // Scope para búsquedas
    public function scopeSearch($query, $search)
    {
        return $query->where('placa', 'LIKE', "%{$search}%")
                    ->orWhere('marca', 'LIKE', "%{$search}%")
                    ->orWhere('modelo', 'LIKE', "%{$search}%")
                    ->orWhere('nombre_cliente', 'LIKE', "%{$search}%")
                    ->orWhere('apellidos_cliente', 'LIKE', "%{$search}%")
                    ->orWhere('documento_cliente', 'LIKE', "%{$search}%");
    }
}
