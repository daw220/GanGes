'use strict'

function limpiarMensaje() {

    setTimeout(function () { document.getElementById("mensaje").innerHTML = ""; }, 5000);
}


function anadir() {

    let form = new FormData();
    form.append("id", document.getElementById("txtId").value);
    form.append("vital", document.getElementById("idVital").value);
    form.append("accion", 2);

    $.ajax({
        type: "POST",
        url: "../operaciones/gestacionOperations.php",
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

        if(i == 0)
        {
            let opt = document.createElement("option");
            opt.value = json[i].ID;
            opt.innerHTML = " " + json[i].DESCRIPCION;
            sel.appendChild(opt);
        }
        else
        {     
            if(i == 1)
            {
                let opt = document.createElement("option");
                opt.value = json[i].ID;
                opt.innerHTML =json[i].DESCRIPCION + "/" + json[i+1].DESCRIPCION;
                sel.appendChild(opt);                
            }   
           
        }

        
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
                div.style=`background-color:#8affa5;`
                
                td1.appendChild(div);

                let div1 = document.createElement("div");
                div1.classList.add("progress-bar");
                div1.role="progressbar";
                div1.style=`width: ${((parseInt(json[i][keys[j]])/parseInt(json[i][keys[j+1]]))*100)}%;background-color:#28a745;`
                div1.ariaValueNow=`${parseInt(json[i][keys[j]])}`
                div1.ariaValueMin=`${0}`
                div1.ariaValueMax=`${parseInt(json[i][keys[j+1]])}`
                div.appendChild(div1);
                
                let span = document.createElement("span");
                span.innerHTML=`Quedan ${parseInt(json[i][keys[j]])} dias.`
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

        btn1.addEventListener("click", (ev => {
            editar(json[i][keys[0]]);

        }));

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


function editar(id) {
    borrarInput();
    if (id != 0){
        $.get("../operaciones/gestacionOperations.php?accion=1&id="+id, (data) => {
            rellenarEditar(JSON.parse(data));
                
        });

    }
};

function rellenarEditar(json) {
    let keys = Object.keys(json[0]);
    document.getElementById("txtId").value = json[0][keys[0]];
    document.getElementById("txtCrotal").value = json[0][keys[1]];
    document.getElementById("txtNom").value = json[0][keys[2]];
    document.getElementById("idVital").value = json[0][keys[3]];
    
}

function borrarInput() {
    let inputs = document.getElementsByClassName("borrar");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

}


function inicio() {

    $.get("../operaciones/gestacionOperations.php?accion=0",function (data) {
            tabla(["CROTAL","NOMBRE","ESTADO","TIEMPO"], JSON.parse(data));
        }
    );

    $.get("../operaciones/gestacionOperations.php?accion=3", (data) => { 
        select(JSON.parse(data), document.getElementById("idVital"), false);
    });
    
};

window.onload = inicio;