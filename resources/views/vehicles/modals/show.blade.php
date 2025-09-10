<!-- Modal Ver Detalles -->
<div class="modal fade" id="showModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-eye me-2"></i>Detalles del Vehículo
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light py-2">
                                <h6 class="mb-0"><i class="fas fa-car me-2"></i>Información del Vehículo</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr><td><strong>Placa:</strong></td><td id="show_placa"></td></tr>
                                    <tr><td><strong>Marca:</strong></td><td id="show_marca"></td></tr>
                                    <tr><td><strong>Modelo:</strong></td><td id="show_modelo"></td></tr>
                                    <tr><td><strong>Año:</strong></td><td id="show_año"></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light py-2">
                                <h6 class="mb-0"><i class="fas fa-user me-2"></i>Información del Cliente</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr><td><strong>Nombres:</strong></td><td id="show_nombres"></td></tr>
                                    <tr><td><strong>Apellidos:</strong></td><td id="show_apellidos"></td></tr>
                                    <tr><td><strong>Documento:</strong></td><td id="show_documento"></td></tr>
                                    <tr><td><strong>Email:</strong></td><td id="show_email"></td></tr>
                                    <tr><td><strong>Teléfono:</strong></td><td id="show_telefono"></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
