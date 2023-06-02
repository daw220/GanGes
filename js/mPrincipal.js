'use strict'

function Registro() {

    let form = new FormData();
    form.append("ID", document.getElementById("id").value);
    form.append("NOMBRE", document.getElementById("nombre").value);
    form.append("AP1", document.getElementById("apellido1").value);
    form.append("AP2", document.getElementById("apellido2").value);
    


    if(document.getElementById("DNI").value.length == 9 )
    {
        form.append("DNI", document.getElementById("DNI").value);
    }
    else
    {
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

    form.append("accion", 1);

    $.ajax({
        type: "POST",
        url: "../operaciones/mPrincipalOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {   
                  
            if (data == 1) {                     
                document.location.href ="../vistas/inicio.php";
            } else {
                let mensaje = document.getElementById("mensaje");
                mensaje.innerHTML = "Edicion fallida. Intentelo de nuevo.";
                mensaje.classList = "alert alert-danger  w-75";
                limpiarMensaje();
            }
        }
    })
}


function input(json)
{
    let keys = Object.keys(json[0]);
    document.getElementById("id").value = json[0][keys[0]];
    document.getElementById("DNI").value = json[0][keys[1]];
    document.getElementById("nombre").value = json[0][keys[2]];
    document.getElementById("apellido1").value = json[0][keys[3]];  
    document.getElementById("apellido2").value = json[0][keys[4]];  
    document.getElementById("email").value = json[0][keys[5]]; 
}


function inicio()
{
    $.get("../operaciones/mPrincipalOperations.php?accion=0",function (data) {
        input(JSON.parse(data));
    });
 
    let btn = document.getElementById("enviar");
    btn.addEventListener("click",()=>{ Registro()})
}

window.onload = inicio;