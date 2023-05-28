'use strict'

function limpiarMensaje() {

    setTimeout(function () { document.getElementById("mensaje").innerHTML = ""; }, 5000);
}


function anadir() {

    let form = new FormData();
    form.append("id", document.getElementById("id").value);
    form.append("nombre", document.getElementById("nombre").value);
    form.append("descripcion", document.getElementById("descripcion").value);
    form.append("cantidad", document.getElementById("cantidad").value);
    form.append("cantidadr", document.getElementById("cantidadr").value);
    form.append("precio", document.getElementById("precio").value);
    form.append("accion", 2);

    $.ajax({
        type: "POST",
        url: "../operaciones/comidaOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {                     
                location.reload();
            } else {
                if (data == -1) {
                    let mensaje = document.getElementById("mensaje");
                    mensaje.innerHTML = "Ya existe este registro";
                    mensaje.style = "color:red;";
                    limpiarMensaje();
                }
            }
        }
    })
}


function select(json, sel, primero) {
    sel.innerHTML = "";
    if (primero == true) {
        let opt = document.createElement("option");
        opt.value = "";
        opt.innerHTML = " -- Selecione -- ";
        sel.appendChild(opt);
    }

    for (let i = 0; i < json.length; i++) {

        let opt = document.createElement("option");
        opt.value = json[i].ID;
        opt.innerHTML = " " + json[i].CROTAL;
        sel.appendChild(opt);
    };
}


function tabla(columnas, json) {

    let tab = document.getElementById("tabla");
    tab.innerHTML = "";
    let thead = document.createElement("thead");
    tab.appendChild(thead);

    let tr = document.createElement("tr");
    thead.appendChild(tr);
    for (let i = 0; i < columnas.length; i++) {

        let td5 = document.createElement("th");
        td5.innerHTML = columnas[i];
        tr.appendChild(td5);
    };

    let td5 = document.createElement("th");
    td5.innerHTML = "ACCIONES";
    tr.appendChild(td5)

    let tbody = document.createElement("tbody");
    tab.appendChild(tbody);
    let keys;
    if(json[0] != null)
    {
        keys= Object.keys(json[0]);
    }

    for (let i = 0; i < json.length; i++) {

        let tr = document.createElement("tr");
        tbody.appendChild(tr);

        for (let j = 0; j < keys.length; j++) {
            
            if(j != 0 && j!=4)
            {
                let td1 = document.createElement("td");
                td1.innerHTML = json[i][keys[j]];
                tr.appendChild(td1);
            }
            if(j == 4)
            {
                let td1 = document.createElement("td");
                tr.appendChild(td1);

                let div = document.createElement("div");
                div.classList.add("progress")
                div.style="background-color:#8affa5";

                td1.appendChild(div);

                let div1 = document.createElement("div");
                div1.classList.add("progress-bar");
                div1.role="progressbar";
                div1.style=`width: ${((parseInt(json[i][keys[j+1]])/parseInt(json[i][keys[j]]))*100)}%;background-color:#28a745`;
                div1.ariaValueNow=`${parseInt(json[i][keys[j+1]])}`;
                div1.ariaValueMin=`${0}`;
                div1.ariaValueMax=`${parseInt(json[i][keys[j]])}`;
                div.appendChild(div1);

                let span = document.createElement("span");
                span.innerHTML=`Quedan ${parseInt(json[i][keys[j+1]])} Kilos.`;
                td1.appendChild(span);


                j++;
            }
        }

        let td1 = document.createElement("td");
        tr.appendChild(td1);

        let btn1 = document.createElement("button");
        btn1.classList = "btn btn-success";
        btn1.setAttribute("data-toggle", "modal");
        btn1.setAttribute("data-target", "#myModal");
        btn1.innerHTML="Editar";
        td1.appendChild(btn1);

        btn1.addEventListener("click", (ev) => {
            editar(json[i][keys[0]], 2);

        });

        let btn2 = document.createElement("button");
        btn2.classList = "btn btn-danger";
        btn2.innerHTML="Borrar";
        td1.appendChild(btn2)

       

        btn2.addEventListener("click", (ev) => {
            borrar(json[i][keys[0]]);

        });
        
        if(i == 0)
        {
            let btn3 = document.getElementById("anadir");
            btn3.addEventListener("click", (ev) => {
                editar(0, 1);

            });
        }

        
    }

    $('#tabla').DataTable({
        lengthMenu: [10, 25, 50],
        pageLength: 10,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sSearch": "Buscar:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
    }});
}

function borrar(id) {
    let form = new FormData();
    form.append("accion", 3);
    form.append("id", id);
    $.ajax({
        type: "POST",
        url: "../operaciones/comidaOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data != 0) {
                location.reload();
            }
        }
    })
} 

function editar(id, ac) {
    menus(ac);
    borrarInput();
    if (id != 0){
        $.get("../operaciones/comidaOperations.php?accion=1&id="+id, (data) => {
            rellenarEditar(JSON.parse(data));
                
        });

    }
};

function menus(accion)
{
    switch (accion) {

        case 1:
            document.getElementById("nombre").disabled= false;
            document.getElementById("des").style="";
            document.getElementById("cantidad").disabled = false; 
            document.getElementById("pre").style="";
            document.getElementById("cr").style="display: none;";
        break;
        case 2:
            document.getElementById("nombre").disabled= true;
            document.getElementById("des").style="display: none;";
            document.getElementById("cantidad").disabled = true; 
            document.getElementById("pre").style="display: none;";
            document.getElementById("cr").style="";
        break;
        default:
        break;
    }
}

function rellenarEditar(json) {
    let keys = Object.keys(json[0]);
    document.getElementById("id").value = json[0][keys[0]];
    document.getElementById("nombre").value = json[0][keys[1]];
    document.getElementById("cantidad").value = json[0][keys[2]];
    
}

function borrarInput() {
    let inputs = document.getElementsByClassName("borrar");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

}


function inicio() {
    $.get("../operaciones/comidaOperations.php?accion=0",function (data) {
           tabla(["NOMBRE","DESCRIPCION","PRECIO","CANTIDAD"], JSON.parse(data));
        }
    );
    
};

window.onload = inicio;