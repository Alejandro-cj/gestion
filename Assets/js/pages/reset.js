const formulario = document.querySelector('#formulario');
const clave_nueva = document.querySelector('#clave_nueva');
const clave_confirmar = document.querySelector('#clave_confirmar');
document.addEventListener('DOMContentLoaded', function () {
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if (clave_nueva.value == '' || clave_confirmar.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            if (clave_nueva.value != clave_confirmar.value) {
                alertaPerzonalizada('warning', 'LAS CONTRASEÑAS NO COINCIDEN');
            } else {
                const data = new FormData(formulario);
                const http = new XMLHttpRequest();
                const url = base_url + 'principal/cambiarPass';
                http.open("POST", url, true);
                http.send(data);
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const res = JSON.parse(this.responseText);
                        alertaPerzonalizada(res.tipo, res.mensaje);
                        if (res.tipo == 'success') {
                            setTimeout(() => {
                                window.location = base_url;
                            }, 1500);
                        }
                    }

                };
            }

        }
    })
})