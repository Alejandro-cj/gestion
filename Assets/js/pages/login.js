//alertaPerzonalizada('success', 'Hola mensaje de prueba de login');

const frm = document.querySelector('#formulario');
const correo = document.querySelector('#correo');
const clave = document.querySelector('#clave');

const inputReset = document.querySelector('#inputReset');
const btnProcesar = document.querySelector('#btnProcesar');
const btnreset = document.querySelector('#reset');
const myModal = new bootstrap.Modal(document.querySelector("#myModal"));

document.addEventListener('DOMContentLoaded', function () {
    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (correo.value == '' || clave.value == '') {
            alertaPerzonalizada('warning', 'Todo los campos con * son requeridos');
        } else {
            const data = new FormData(frm);
            const http = new XMLHttpRequest();
            const url = base_url + 'principal/validar';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {
                        let timerInterval
                        Swal.fire({
                            title: res.mensaje,
                            html: 'Sera redirecionado en <b></b> milliseconds.',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                window.location = base_url + 'admin';
                            }
                        })
                    }
                }
            };
        }
    })

    btnreset.addEventListener('click', function(){
        inputReset.value = '';
        myModal.show();
    })

    btnProcesar.addEventListener('click', function(){
        if (inputReset.value == '') {
            alertaPerzonalizada('warning', 'INGRESE EL CORREO');
        } else {
            const http = new XMLHttpRequest();
            const url = base_url + 'principal/enviarCorreo/' + inputReset.value;
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPerzonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {
                        inputReset.value = '';
                        myModal.hide();
                    }
                }
            }; 
        }
    })
})