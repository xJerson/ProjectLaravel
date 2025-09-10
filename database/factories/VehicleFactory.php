<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    public function definition(): array
    {
        $marcas = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Hyundai', 'Kia', 'Volkswagen', 'Mazda', 'Subaru'];
        $modelos = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Prius', 'Hilux'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit'],
            'Ford' => ['Focus', 'Fiesta', 'Explorer', 'F-150', 'Escape'],
            'Chevrolet' => ['Spark', 'Cruze', 'Malibu', 'Equinox', 'Suburban'],
            'Nissan' => ['Sentra', 'Altima', 'Rogue', 'Pathfinder', 'Frontier'],
            'Hyundai' => ['Elantra', 'Sonata', 'Tucson', 'Santa Fe', 'Genesis'],
            'Kia' => ['Rio', 'Forte', 'Optima', 'Sportage', 'Sorento'],
            'Volkswagen' => ['Jetta', 'Passat', 'Tiguan', 'Atlas', 'Golf'],
            'Mazda' => ['Mazda3', 'Mazda6', 'CX-5', 'CX-9', 'MX-5'],
            'Subaru' => ['Impreza', 'Legacy', 'Outback', 'Forester', 'Ascent']
        ];

        $marca = $this->faker->randomElement($marcas);
        $modelo = $this->faker->randomElement($modelos[$marca]);

        return [
            'placa' => strtoupper($this->faker->bothify('???-###')),
            'marca' => $marca,
            'modelo' => $modelo,
            'año_fabricacion' => $this->faker->numberBetween(2010, date('Y')),
            'nombre_cliente' => $this->faker->firstName(),
            'apellidos_cliente' => $this->faker->lastName() . ' ' . $this->faker->lastName(),
            'documento_cliente' => $this->faker->unique()->numerify('########'),
            'correo_cliente' => $this->faker->unique()->safeEmail(),
            'telefono_cliente' => $this->faker->phoneNumber(),
        ];
    }
}
