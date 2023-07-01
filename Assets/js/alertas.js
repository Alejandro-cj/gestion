function alertaPerzonalizada(type, mensaje) {
    Swal.fire({
        position: 'top-end',
        icon: type,
        title: mensaje,
        showConfirmButton: false,
        timer: 1500
    })
}