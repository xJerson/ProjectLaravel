    document.addEventListener('DOMContentLoaded', function() {
        // Auto-uppercase placa
        document.getElementById('placa').addEventListener('input', function(e) {
            e.target.value = e.target.value.toUpperCase();
        });


        ['nombre_cliente', 'apellidos_cliente', 'marca', 'modelo'].forEach(function(fieldId) {
            document.getElementById(fieldId).addEventListener('input', function(e) {
                let words = e.target.value.split(' ');
                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
                e.target.value = words.join(' ');
            });
        });
    });
