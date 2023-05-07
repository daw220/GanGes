'use strict'

function limpiarMensaje() {
    
    setTimeout(function () { 
        document.getElementById("mensaje").innerHTML = "";  
        document.getElementById("mensaje").classList = ""; 
    }, 5000);
}


function InicioSesion() {

    let form = new FormData();
    form.append("EMAIL", document.getElementById("email").value);
    let contra= document.getElementById("pass").value;
    const sha256 = new sjcl.hash.sha256();
    sha256.update(contra);
    var contraCifrada = sjcl.codec.hex.fromBits(sha256.finalize());
    form.append("PASS", contraCifrada);
    form.append("accion",1);
    $.ajax({
        type: "POST",
        url: "../operaciones/SessionOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {                     
                document.location.href ="../vistas/acceso.php";
            } else {
                let mensaje = document.getElementById("mensaje");
                mensaje.innerHTML = "Inico de sesión no valido";
                mensaje.classList = "alert alert-danger";
                limpiarMensaje();
                return;

            }
        }
    })
}






function inicio() {

   let btn = document.getElementById("enviar");
   btn.addEventListener("click",()=>{ InicioSesion()})
    
};

window.onload = inicio;