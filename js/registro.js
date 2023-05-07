'use strict'

function limpiarMensaje() {

    setTimeout(function () { 
        document.getElementById("mensaje").innerHTML = "";  
        document.getElementById("mensaje").classList = ""; 
    }, 5000);
}


function Registro() {

    let form = new FormData();
    form.append("NOMBRE", document.getElementById("nombre").value);
    form.append("AP1", document.getElementById("apellido1").value);
    form.append("AP2", document.getElementById("apellido1").value);
    


    if(document.getElementById("DNI").value.length == 9 )
    {
        form.append("DNI", document.getElementById("DNI").value);
    }
    else{
        let mensaje = document.getElementById("mensaje");
        mensaje.innerHTML = 'El DNI o NIE debe tener exactamente 9 caracteres.';
        mensaje.classList = "alert alert-danger";
        limpiarMensaje();
        return;
    }

  
    if(document.getElementById("email").value.includes('@') && document.getElementById("email").value.includes('.'))
    {
        form.append("EMAIL", document.getElementById("email").value);
    }
    else{
        let mensaje = document.getElementById("mensaje");
        mensaje.innerHTML = 'El correo debe incluir una @ y una extension (.com).';
        mensaje.classList = "alert alert-danger";
        limpiarMensaje();
        return;
    }


    if(document.getElementById("pass1").value == document.getElementById("pass2").value)
    {
        let contra= document.getElementById("pass1").value;
        const sha256 = new sjcl.hash.sha256();
        sha256.update(contra);
        var contraCifrada = sjcl.codec.hex.fromBits(sha256.finalize());
        form.append("PASS", contraCifrada);
    }
    else{
        let mensaje = document.getElementById("mensaje");
        mensaje.innerHTML = "Las contraseñas deben coincidir.";
        mensaje.classList = "alert alert-danger";
        limpiarMensaje();
        return;
    }
        
    form.append("accion",2);

    $.ajax({
        type: "POST",
        url: "../operaciones/SessionOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {   
                  
            if (data == 1) {                     
                document.location.href ="../vistas/inicio.php";
            } else {
                let mensaje = document.getElementById("mensaje");
                mensaje.innerHTML = "Registro fallido. Intentelo de nuevo.";
                mensaje.classList = "alert alert-danger";
                limpiarMensaje();
            }
        }
    })
}


function inicio() {

   let btn = document.getElementById("enviar");
   btn.addEventListener("click",()=>{ Registro()})
    
};

window.onload = inicio;