$(document).ready(function() {
    // Configurar token CSRF para AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const table = $('#vehiclesTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: VEHICLES_ROUTES.data,
        columns: [
            { data: 'placa', name: 'placa' },
            { data: 'marca', name: 'marca' },
            { data: 'modelo', name: 'modelo' },
            { data: 'año_fabricacion', name: 'año_fabricacion' },
            { data: 'nombre_completo', name: 'nombre_cliente' },
            { data: 'documento_cliente', name: 'documento_cliente' },
            { data: 'correo_cliente', name: 'correo_cliente' },
            { data: 'telefono_cliente', name: 'telefono_cliente' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel me-1"></i>Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf me-1"></i>PDF',
                className: 'btn btn-danger btn-sm'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print me-1"></i>Imprimir',
                className: 'btn btn-info btn-sm'
            }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        order: [[0, 'desc']]
    });

    // Abrir modal en modo CREAR
    $('[data-bs-target="#createModal"]').on('click', function () {
        resetForm();
    });

    // Auto-uppercase placa
    $('#placa').on('input', function() {
        this.value = this.value.toUpperCase();
    });

    // Capitalizar nombres/marca/modelo
    $('#nombre_cliente, #apellidos_cliente, #marca, #modelo').on('input', function() {
        let words = this.value.split(' ');
        for (let i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
        }
        this.value = words.join(' ');
    });

    // Enviar formulario (crear o actualizar)
    $('#vehicleForm').on('submit', function(e) {
        e.preventDefault();

        const vehicleId = $('#vehicleId').val();
        const isEdit = vehicleId !== '';
        const url = isEdit ? `/vehicles/${vehicleId}` : VEHICLES_ROUTES.store;

        const formData = $(this).serialize() + (isEdit ? '&_method=PUT' : '');

        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');

        $.post(url, formData)
            .done(function(response) {
                $('#createModal').modal('hide');
                table.ajax.reload();
                Swal.fire('¡Éxito!', response.message || 'Operación realizada exitosamente', 'success');
            })
            .fail(function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}`).siblings('.invalid-feedback').text(errors[key][0]);
                    });
                } else {
                    Swal.fire('Error', 'Ocurrió un error al procesar la solicitud', 'error');
                }
            });
    });

    // Delegación de eventos en botones de acción
    $('#vehiclesTable tbody').on('click', '.btn', function () {
        const data = table.row($(this).parents('tr')).data();
        const vehicleId = data.id;

        if ($(this).hasClass('btn-outline-info')) {
            // VER
            $.get(`/vehicles/${vehicleId}`, function(response) {
                $('#show_placa').text(response.placa);
                $('#show_marca').text(response.marca);
                $('#show_modelo').text(response.modelo);
                $('#show_año').text(response.año_fabricacion);
                $('#show_nombres').text(response.nombre_cliente);
                $('#show_apellidos').text(response.apellidos_cliente);
                $('#show_documento').text(response.documento_cliente);
                $('#show_email').text(response.correo_cliente);
                $('#show_telefono').text(response.telefono_cliente);
                $('#showModal').modal('show');
            });
        } else if ($(this).hasClass('btn-outline-warning')) {
            // EDITAR
            $.get(`/vehicles/${vehicleId}/edit`, function(response) {
                $('#modalTitle').text('Editar Vehículo');
                $('#submitButtonText').text('Actualizar Vehículo');
                $('#vehicleId').val(response.id);
                $('#formMethod').val('PUT');

                $('#placa').val(response.placa);
                $('#marca').val(response.marca);
                $('#modelo').val(response.modelo);
                $('#año_fabricacion').val(response.año_fabricacion);
                $('#nombre_cliente').val(response.nombre_cliente);
                $('#apellidos_cliente').val(response.apellidos_cliente);
                $('#documento_cliente').val(response.documento_cliente);
                $('#correo_cliente').val(response.correo_cliente);
                $('#telefono_cliente').val(response.telefono_cliente);

                $('#createModal').modal('show');
            });
        } else if ($(this).hasClass('btn-outline-danger')) {
            // ELIMINAR
            const placa = data.placa;
            Swal.fire({
                title: `¿Eliminar vehículo con placa ${placa}?`,
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(`/vehicles/${vehicleId}`, { _method: 'DELETE' })
                        .done(function(response) {
                            table.ajax.reload();
                            Swal.fire('¡Eliminado!', 'El vehículo ha sido eliminado exitosamente.', 'success');
                        })
                        .fail(function() {
                            Swal.fire('Error', 'No se pudo eliminar el vehículo.', 'error');
                        });
                }
            });
        }
    });

    // Función para resetear modal (modo crear)
    function resetForm() {
        $('#vehicleForm')[0].reset();
        $('#vehicleId').val('');
        $('#formMethod').val('');
        $('#modalTitle').text('Registrar Nuevo Vehículo');
        $('#submitButtonText').text('Guardar Vehículo');
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');
    }
});
