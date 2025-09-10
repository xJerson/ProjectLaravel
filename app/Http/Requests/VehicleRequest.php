<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $vehicleId = $this->route('vehicle') ? $this->route('vehicle')->id : null;

        return [
            'placa' => [
                'required',
                'string',
                'max:10',
                'regex:/^[A-Z0-9-]+$/',
                Rule::unique('vehicles')->ignore($vehicleId)
            ],
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'año_fabricacion' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'nombre_cliente' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'apellidos_cliente' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'documento_cliente' => [
                'required',
                'string',
                'max:20',
                'regex:/^[0-9]+$/',
                Rule::unique('vehicles')->ignore($vehicleId)
            ],
            'correo_cliente' => [
                'required',
                'email',
                'max:150',
                Rule::unique('vehicles')->ignore($vehicleId)
            ],
            'telefono_cliente' => 'required|string|max:20|regex:/^[0-9+\-\s()]+$/'
        ];
    }

    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.unique' => 'Esta placa ya está registrada.',
            'placa.regex' => 'La placa solo puede contener letras, números y guiones.',
            'marca.required' => 'La marca es obligatoria.',
            'modelo.required' => 'El modelo es obligatorio.',
            'año_fabricacion.required' => 'El año de fabricación es obligatorio.',
            'año_fabricacion.min' => 'El año debe ser mayor a 1900.',
            'año_fabricacion.max' => 'El año no puede ser mayor al próximo año.',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'nombre_cliente.regex' => 'El nombre solo puede contener letras y espacios.',
            'apellidos_cliente.required' => 'Los apellidos del cliente son obligatorios.',
            'apellidos_cliente.regex' => 'Los apellidos solo pueden contener letras y espacios.',
            'documento_cliente.required' => 'El número de documento es obligatorio.',
            'documento_cliente.unique' => 'Este número de documento ya está registrado.',
            'documento_cliente.regex' => 'El documento solo puede contener números.',
            'correo_cliente.required' => 'El correo electrónico es obligatorio.',
            'correo_cliente.email' => 'El formato del correo electrónico no es válido.',
            'correo_cliente.unique' => 'Este correo electrónico ya está registrado.',
            'telefono_cliente.required' => 'El teléfono es obligatorio.',
            'telefono_cliente.regex' => 'El formato del teléfono no es válido.'
        ];
    }
}
