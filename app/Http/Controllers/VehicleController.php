<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VehicleController extends Controller
{
    public function index()
    {
        return view('vehicles.index');
    }

    public function data()
    {
        $vehicles = Vehicle::select([
            'id', 'placa', 'marca', 'modelo', 'año_fabricacion',
            'nombre_cliente', 'apellidos_cliente', 'documento_cliente',
            'correo_cliente', 'telefono_cliente'
        ]);

        return DataTables::of($vehicles)
            ->addColumn('nombre_completo', function ($vehicle) {
                return $vehicle->nombre_cliente . ' ' . $vehicle->apellidos_cliente;
            })
            ->addColumn('action', function ($vehicle) {
                return '
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="javascript:void(0)" class="btn btn-outline-info" data-id="' . $vehicle->id . '" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-outline-warning edit-btn" data-id="' . $vehicle->id . '" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-outline-danger" data-id="' . $vehicle->id . '" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                ';
            })
            ->filterColumn('nombre_completo', function($query, $keyword) {
                $query->whereRaw("CONCAT(nombre_cliente,' ',apellidos_cliente) like ?", ["%{$keyword}%"]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(VehicleRequest $request)
    {
        try {
            DB::beginTransaction();

            Vehicle::create($request->validated());

            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Vehículo registrado exitosamente.'
                ]);
            }

            return redirect()->route('vehicles.index')
                           ->with('success', 'Vehículo registrado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al registrar el vehículo: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Error al registrar el vehículo: ' . $e->getMessage());
        }
    }

    public function show(Vehicle $vehicle)
    {
        if (request()->ajax()) {
            return response()->json([
                'id' => $vehicle->id,
                'placa' => $vehicle->placa,
                'marca' => $vehicle->marca,
                'modelo' => $vehicle->modelo,
                'año_fabricacion' => $vehicle->año_fabricacion,
                'nombre_cliente' => $vehicle->nombre_cliente,
                'apellidos_cliente' => $vehicle->apellidos_cliente,
                'documento_cliente' => $vehicle->documento_cliente,
                'correo_cliente' => $vehicle->correo_cliente,
                'telefono_cliente' => $vehicle->telefono_cliente
            ]);
        }

        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        if (request()->ajax()) {
            return response()->json($vehicle);
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        try {
            DB::beginTransaction();

            $vehicle->update($request->validated());

            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Vehículo actualizado exitosamente.'
                ]);
            }

            return redirect()->route('vehicles.index')
                           ->with('success', 'Vehículo actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar el vehículo: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Error al actualizar el vehículo: ' . $e->getMessage());
        }
    }

    public function destroy(Vehicle $vehicle)
    {
        try {
            DB::beginTransaction();

            $vehicle->delete();

            DB::commit();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Vehículo eliminado exitosamente.'
                ]);
            }

            return redirect()->route('vehicles.index')
                           ->with('success', 'Vehículo eliminado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar el vehículo: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Error al eliminar el vehículo: ' . $e->getMessage());
        }
    }
}
