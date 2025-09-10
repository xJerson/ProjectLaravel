@extends('layouts.app')

@section('title', 'Lista de Vehículos - VIP2CARS')

@section('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">

<link rel="stylesheet" href="{{ asset('css/vehicles.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="mb-0">
                            <i class="fas fa-cars me-2"></i>Gestión de Vehículos
                        </h4>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus me-1"></i>Nuevo Vehículo
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="vehiclesTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Cliente</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Incluir modales --}}
@include('vehicles.modals.create-edit')
@include('vehicles.modals.show')
@endsection

@section('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

<script>
    window.VEHICLES_ROUTES = {
        data: "{{ route('vehicles.data') }}",
        store: "{{ route('vehicles.store') }}"
    };
</script>
<script src="{{ asset('js/vehicles.js') }}"></script>

@endsection
