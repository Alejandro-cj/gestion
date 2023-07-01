let tblArchivos;

document.addEventListener('DOMContentLoaded', function () {
    //CARGAR DATOS CON DATATABLE
    tblArchivos = $('#tblArchivos').DataTable({
        ajax: {
            url: base_url + 'archivos/listarHistorial',
            dataSrc: ''
        },
        columns: [
            { data: 'accion' },
            { data: 'id' },
            { data: 'nombre' },
            { data: 'tipo' },
            { data: 'fecha_create' },
            { data: 'elimina' }
        ],
        language : {
            url : 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        order: [[1, 'desc']],
    });
})

function restaurar(id) {
    const url = base_url + 'archivos/delete/' + id;
    eliminarRegistro('ESTA SEGURO DE RESTAURAR', 'EL ARCHIVO APARECERÁ EN EL MISMO DIRECTORIO', 'SI RESTAURAR', url, tblArchivos)
}