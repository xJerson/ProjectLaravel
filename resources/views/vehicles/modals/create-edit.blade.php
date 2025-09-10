<!-- Modal Crear/Editar Vehículo -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2"></i>
                    <span id="modalTitle">Registrar Nuevo Vehículo</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="vehicleForm">
                @csrf
                <input type="hidden" id="vehicleId" name="vehicleId">
                <input type="hidden" id="formMethod" name="_method" value="">

                <div class="modal-body">
                    <!-- Datos del Vehículo -->
                    <div class="card mb-3">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0"><i class="fas fa-car me-2"></i>Información del Vehículo</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="placa" class="form-label">Placa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="placa" name="placa"
                                        placeholder="Ej: ABC-123" style="text-transform: uppercase;">
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="año_fabricacion" class="form-label">Año <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="año_fabricacion" name="año_fabricacion"
                                        min="1900" max="{{ date('Y') + 1 }}" placeholder="{{ date('Y') }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="marca" class="form-label">Marca <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="marca" name="marca"
                                        placeholder="Toyota, Honda, Ford" >
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="modelo" class="form-label">Modelo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="modelo" name="modelo"
                                        placeholder="Corolla, Civic, Focus" >
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos del Cliente -->
                    <div class="card">
                        <div class="card-header bg-light py-2">
                            <h6 class="mb-0"><i class="fas fa-user me-2"></i>Información del Cliente</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_cliente" class="form-label">Nombres <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" >
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="apellidos_cliente" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="apellidos_cliente" name="apellidos_cliente" >
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="documento_cliente" class="form-label">Documento <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="documento_cliente" name="documento_cliente"
                                        placeholder="DNI, CI, Pasaporte" >
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="telefono_cliente" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="telefono_cliente" name="telefono_cliente"
                                        placeholder="+51 999 999 999" >
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="correo_cliente" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="correo_cliente" name="correo_cliente"
                                    placeholder="cliente@email.com" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>
                        <span id="submitButtonText">Guardar Vehículo</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
