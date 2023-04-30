'use strict'

function obligatorio() {
    let exito = true;
    let inputs = document.getElementsByClassName("obligatorio");
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "") {
            exito = false;
            inputs[i].parentNode.classList.add("error");
        } else {
            inputs[i].parentNode.classList.remove("error");
        }
    }
    return exito;
}

function limpiarMensaje() {

    setTimeout(function () { document.getElementById("mensaje").innerHTML = ""; }, 5000);
}


function anadir() {

    let form = new FormData();
    form.append("idAni", document.getElementById("txtID").value);
    form.append("crotal", document.getElementById("txtCrotal").value);
    form.append("nombre", document.getElementById("txtNom").value);
    form.append("fecha", document.getElementById("fecha").value);
    form.append("sexo", document.getElementById("idSexo").value);
    form.append("raza", document.getElementById("txtRaza").value);
    form.append("explo", document.getElementById("idExplotacion").value);
    form.append("vital", document.getElementById("idVital").value);
    form.append("accion", 2);
    
    let regex = /^ES\d{12}$/;
    let str = document.getElementById("txtCrotal").value;
    let isValid = regex.test(str);

    if(!isValid)
    {
        let mensaje = document.getElementById("mensaje");
        mensaje.innerHTML = "Formato de crotal no valido";
        mensaje.style = "color:red;";
        limpiarMensaje();
        return;
    }    

    $.ajax({
        type: "POST",
        url: "../operaciones/rebanoOperations.php",
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
        opt.innerHTML = " " + json[i].DESCRIPCION;
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
            let td1 = document.createElement("td");
            td1.innerHTML = json[i][keys[j]];
            tr.appendChild(td1);
        }

        let td1 = document.createElement("td");
        tr.appendChild(td1);

        let btn1 = document.createElement("button");
        btn1.classList = "btn btn-success";
        btn1.setAttribute("data-toggle", "modal");
        btn1.setAttribute("data-target", "#myModal");
        btn1.innerHTML="Editar";
        td1.appendChild(btn1);

        btn1.addEventListener("click", (ev => {
            editar(json[i][keys[0]]);

        }));

        let btn2 = document.createElement("button");
        btn2.classList = "btn btn-danger";
        btn2.innerHTML="Eliminar";
        td1.appendChild(btn2)

       

        btn2.addEventListener("click", (ev => {
            borrar(json[i][keys[0]]);

        }));
        
        if(i == 0)
        {
            let btn3 = document.getElementById("anadir");
            btn3.addEventListener("click", (ev => {
                editar(0);

            }));
        }
    }
    

    
}
function borrar(id) {
    let form = new FormData();
    form.append("accion", 3);
    form.append("ID", id);
    $.ajax({
        type: "POST",
        url: "../operaciones/rebanoOperations.php",
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



function editar(id) {
    borrarInput();
    if (id != 0){
        $.get("../operaciones/rebanoOperations.php?accion=1&id="+id, (data) => {
            rellenarEditar(JSON.parse(data));
                
        });

    }
};

function rellenarEditar(json) {
    let keys = Object.keys(json[0]);
    document.getElementById("txtID").value = json[0][keys[0]];
    document.getElementById("txtCrotal").value = json[0][keys[1]];
    document.getElementById("txtNom").value = json[0][keys[2]];
    document.getElementById("fecha").value = json[0][keys[3]];
    document.getElementById("idSexo").value = json[0][keys[4]];
    document.getElementById("txtRaza").value = json[0][keys[5]];
    document.getElementById("idVital").value = json[0][keys[6]];
    document.getElementById("idExplotacion").value = json[0][keys[7]];
    
}

function borrarInput() {
    let inputs = document.getElementsByClassName("borrar");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

}


function inicio() {
    $.get("../operaciones/rebanoOperations.php?accion=0",function (data) {

           tabla(["ID","CROTAL","NOMBRE","FECHA NACIMIENTO","RAZA"], JSON.parse(data));
        }
    );

    $.get("../operaciones/rebanoOperations.php?accion=4", (data) => {

        select(JSON.parse(data), document.getElementById("idSexo"), true);
    });
    $.get("../operaciones/rebanoOperations.php?accion=5", (data) => {
        select(JSON.parse(data), document.getElementById("idExplotacion"), true);
    });
    $.get("../operaciones/rebanoOperations.php?accion=6", (data) => {
        select(JSON.parse(data), document.getElementById("idVital"), true);
    });

    $("#fecha").datepicker(
        {
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true
        }
    );
    
};

window.onload = inicio;