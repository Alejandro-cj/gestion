const frmProfile = document.querySelector('#frmProfile');
const correo = document.querySelector('#correo');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');

const frmPass = document.querySelector('#frmPass');
const clave_actual = document.querySelector('#clave_actual');
const clave_nueva = document.querySelector('#clave_nueva');
const clave_confirmar = document.querySelector('#clave_confirmar');
document.addEventListener('DOMContentLoaded', function () {
    frmPass.addEventListener('submit', function (e) {
        e.preventDefault();
        if (clave_actual.value == '' || clave_nueva.value == '' || clave_confirmar.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            if (clave_nueva.value != clave_confirmar.value) {
                alertaPerzonalizada('warning', 'LAS CONTRASEÑAS NO COINCIDEN');
            } else {
                const data = new FormData(frmPass);
                const http = new XMLHttpRequest();
                const url = base_url + 'usuarios/cambiarPass';
                http.open("POST", url, true);
                http.send(data);
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const res = JSON.parse(this.responseText);
                        alertaPerzonalizada(res.tipo, res.mensaje);
                        if (res.tipo == 'success') {
                            setTimeout(() => {
                                window.location = base_url + 'usuarios/salir';
                            }, 1500);
                        }
                    }

                };
            }

        }
    })

    frmProfile.addEventListener('submit', function (e) {
        e.preventDefault();
        if (correo.value == '' || nombre.value == '' || apellido.value == '' || telefono.value == '' || direccion.value == '') {
            alertaPerzonalizada('warning', 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            const data = new FormData(frmProfile);
            const http = new XMLHttpRequest();
            const url = base_url + 'usuarios/cambiarProfile';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                }

            };

        }
    })
})