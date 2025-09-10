@extends('layouts.app')

@section('title', 'Nuevo Vehículo - VIP2CARS')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-plus-circle me-2"></i>Registrar Nuevo Vehículo
                </h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('vehicles.store') }}">
                    @csrf

                    <!-- Datos del Vehículo -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-car me-2"></i>Información del Vehículo</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="placa" class="form-label">Placa <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('placa') is-invalid @enderror"
                                           id="placa"
                                           name="placa"
                                           value="{{ old('placa') }}"
                                           placeholder="Ej: ABC-123"
                                           style="text-transform: uppercase;">
                                    @error('placa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="año_fabricacion" class="form-label">Año de Fabricación <span class="text-danger">*</span></label>
                                    <input type="number"
                                           class="form-control @error('año_fabricacion') is-invalid @enderror"
                                           id="año_fabricacion"
                                           name="año_fabricacion"
                                           value="{{ old('año_fabricacion') }}"
                                           min="1900"
                                           max="{{ date('Y') + 1 }}"
                                           placeholder="{{ date('Y') }}">
                                    @error('año_fabricacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="marca" class="form-label">Marca <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('marca') is-invalid @enderror"
                                           id="marca"
                                           name="marca"
                                           value="{{ old('marca') }}"
                                           placeholder="Ej: Toyota, Honda, Ford">
                                    @error('marca')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="modelo" class="form-label">Modelo <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('modelo') is-invalid @enderror"
                                           id="modelo"
                                           name="modelo"
                                           value="{{ old('modelo') }}"
                                           placeholder="Ej: Corolla, Civic, Focus">
                                    @error('modelo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos del Cliente -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-user me-2"></i>Información del Cliente</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_cliente" class="form-label">Nombres <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('nombre_cliente') is-invalid @enderror"
                                           id="nombre_cliente"
                                           name="nombre_cliente"
                                           value="{{ old('nombre_cliente') }}"
                                           placeholder="Nombres del cliente">
                                    @error('nombre_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="apellidos_cliente" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('apellidos_cliente') is-invalid @enderror"
                                           id="apellidos_cliente"
                                           name="apellidos_cliente"
                                           value="{{ old('apellidos_cliente') }}"
                                           placeholder="Apellidos del cliente">
                                    @error('apellidos_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="documento_cliente" class="form-label">Número de Documento <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('documento_cliente') is-invalid @enderror"
                                           id="documento_cliente"
                                           name="documento_cliente"
                                           value="{{ old('documento_cliente') }}"
                                           placeholder="DNI, CI, Pasaporte">
                                    @error('documento_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="telefono_cliente" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                    <input type="tel"
                                           class="form-control @error('telefono_cliente') is-invalid @enderror"
                                           id="telefono_cliente"
                                           name="telefono_cliente"
                                           value="{{ old('telefono_cliente') }}"
                                           placeholder="+51 999 999 999">
                                    @error('telefono_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="correo_cliente" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email"
                                       class="form-control @error('correo_cliente') is-invalid @enderror"
                                       id="correo_cliente"
                                       name="correo_cliente"
                                       value="{{ old('correo_cliente') }}"
                                       placeholder="cliente@email.com">
                                @error('correo_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Guardar Vehículo
                        </button>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/create.js') }}"></script>
@endsection
