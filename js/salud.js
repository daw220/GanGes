'use strict'

function limpiarMensaje() {

    setTimeout(function () { document.getElementById("mensaje").innerHTML = ""; }, 5000);
}


function anadir() {

    let form = new FormData();
    form.append("crotal", document.getElementById("txtCrotal").value);
    form.append("salud", document.getElementById("salud").value);
    form.append("accion", 2);

    $.ajax({
        type: "POST",
        url: "../operaciones/saludOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {                     
                document.getElementById("btncancelar").click();
                inicio();
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
            
            if(j != 0)
            {
                if(keys[j] == "SALUD")
                {
                    let td1 = document.createElement("td");
                    td1.setAttribute("data-toggle", "modal");
                    td1.setAttribute("data-target", "#myModal");
                    td1.innerHTML="Mostrar Detalles";
                    tr.appendChild(td1);

                    td1.addEventListener("click", (ev) => {
                        editar(json[i][keys[0]], 2);
            
                    });
                }
                else
                {
                    let td1 = document.createElement("td");
                    td1.innerHTML = json[i][keys[j]];
                    tr.appendChild(td1);
                }
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
            editar(json[i][keys[0]], 3);

        });

        let btn2 = document.createElement("button");
        btn2.classList = "btn btn-danger";
        btn2.innerHTML="Recuperada";
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
}

function borrar(id) {
    let form = new FormData();
    form.append("accion", 4);
    form.append("ID", id);
    $.ajax({
        type: "POST",
        url: "../operaciones/saludOperations.php",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data != 0) {
                inicio();
            }
        }
    })
} 

function editar(id, ac) {
    menus(ac);
    borrarInput();
    if (id != 0){
        $.get("../operaciones/saludOperations.php?accion=1&id="+id, (data) => {
            rellenarEditar(JSON.parse(data));
                
        });

    }
};

function menus(accion)
{
    switch (accion) {

        case 1:
            document.getElementById("txtID").style="display: none;";
            document.getElementById("txtCrotal").style="display: block;";
            document.getElementById("txtID").disabled = false;
            document.getElementById("salud").disabled = false; 
            document.getElementById("btnaceptar").style="display: block;";
        break;
        case 2:
            document.getElementById("txtID").style="display: block;";
            document.getElementById("txtCrotal").style="display: none;";
            document.getElementById("txtID").disabled = true;
            document.getElementById("salud").disabled = true; 
            document.getElementById("btnaceptar").style="display: none;";
        break;
        case 3:
            document.getElementById("txtID").style="display: block;";
            document.getElementById("txtCrotal").style="display: none;";
            document.getElementById("txtID").disabled = true;
            document.getElementById("salud").disabled = false; 
            document.getElementById("btnaceptar").style="display: block;";
        break;
        default:
        break;
    }
}

function rellenarEditar(json) {
    let keys = Object.keys(json[0]);
    document.getElementById("txtID").value = json[0][keys[1]];
    document.getElementById("txtCrotal").value = json[0][keys[0]];
    document.getElementById("salud").value = json[0][keys[2]];
    
}

function borrarInput() {
    let inputs = document.getElementsByClassName("borrar");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

}


function inicio() {
    $.get("../operaciones/saludOperations.php?accion=0",function (data) {
           tabla(["CROTAL","NOMBRE","SALUD"], JSON.parse(data));
        }
    );

    $.get("../operaciones/saludOperations.php?accion=3", (data) => {
        select(JSON.parse(data), document.getElementById("txtCrotal"), true);
    });
    
};

window.onload = inicio;