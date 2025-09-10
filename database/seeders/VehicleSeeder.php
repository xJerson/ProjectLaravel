<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear algunos vehículos de ejemplo específicos
        $vehiculosEjemplo = [
            [
                'placa' => 'ABC-123',
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'año_fabricacion' => 2020,
                'nombre_cliente' => 'Juan Carlos',
                'apellidos_cliente' => 'García López',
                'documento_cliente' => '12345678',
                'correo_cliente' => 'juan.garcia@email.com',
                'telefono_cliente' => '+51 999 888 777'
            ],
            [
                'placa' => 'DEF-456',
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'año_fabricacion' => 2019,
                'nombre_cliente' => 'María Elena',
                'apellidos_cliente' => 'Rodríguez Silva',
                'documento_cliente' => '87654321',
                'correo_cliente' => 'maria.rodriguez@email.com',
                'telefono_cliente' => '+51 888 777 666'
            ],
            [
                'placa' => 'GHI-789',
                'marca' => 'Ford',
                'modelo' => 'Focus',
                'año_fabricacion' => 2021,
                'nombre_cliente' => 'Pedro Antonio',
                'apellidos_cliente' => 'Martínez Vega',
                'documento_cliente' => '11223344',
                'correo_cliente' => 'pedro.martinez@email.com',
                'telefono_cliente' => '+51 777 666 555'
            ],
            [
                'placa' => 'JKL-012',
                'marca' => 'Chevrolet',
                'modelo' => 'Cruze',
                'año_fabricacion' => 2018,
                'nombre_cliente' => 'Ana Sofía',
                'apellidos_cliente' => 'Fernández Castro',
                'documento_cliente' => '44332211',
                'correo_cliente' => 'ana.fernandez@email.com',
                'telefono_cliente' => '+51 666 555 444'
            ],
            [
                'placa' => 'MNO-345',
                'marca' => 'Nissan',
                'modelo' => 'Sentra',
                'año_fabricacion' => 2022,
                'nombre_cliente' => 'Luis Miguel',
                'apellidos_cliente' => 'Herrera Díaz',
                'documento_cliente' => '55667788',
                'correo_cliente' => 'luis.herrera@email.com',
                'telefono_cliente' => '+51 555 444 333'
            ]
        ];

        // Crear vehículos específicos
        foreach ($vehiculosEjemplo as $vehiculo) {
            Vehicle::create($vehiculo);
        }

        // Crear vehículos adicionales usando factory
        Vehicle::factory(20)->create();
    }
}
