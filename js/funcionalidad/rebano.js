'use strict'

/*Funcion que borra los mensajer de retroalimentacion pàra el usuario*/
function limpiarMensaje() {

    setTimeout(function () { document.getElementById("mensaje").innerHTML = ""; }, 5000);
}

/*Utilizadon la funcion ajax de Jquery añadie un registro a la base de datos*/
function anadir() {
    if (obligatorio() == true) {

        let form = new FormData();
        let id = document.getElementById("txtID").value;
        form.append("IIDCURSO", id);
        let nombre = document.getElementById("txtNom").value;
        form.append("NOMBRE", nombre);
        let descripcion = document.getElementById("txtDescripcion").value;
        form.append("DESCRIPCION", descripcion);
        form.append("BHABILITADO", 1);


        if (confirm("¿Seguro que quieres guardar?") == 1) {
            $.ajax({
                type: "POST",
                url: "/Curso/Insertar",
                data: form,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 1) {                     
                        document.getElementById("btncancelar").click();
                        inicio();
                    } else {
                        if (data == -1) {
                            let na = localStorage.getItem("na");
                            if (na == 1) {
                                voz("Ya existe este curso", true);
                            }

                            let mensaje = document.getElementById("mensaje");
                            mensaje.innerHTML = "Ya existe este curso";
                            mensaje.style = "color:red;";
                            limpiarMensaje();
                        } else {
                            console.log("Error en cs")
                        }

                    }
                }
            })
        }
    }
}




/*Genera la estructura basica de una tabla con  diferente campo y funciones*/
function tabla(columnas, json) {

    let div = document.getElementById("tablas");
    div.innerHTML = "";

    let tab = document.createElement("table");
    tab.id = "tabla";
    tab.classList = "table"
    div.appendChild(tab);

    let thead = document.createElement("thead");
    tab.appendChild(thead);

    let tr = document.createElement("tr");
    thead.appendChild(tr);
    for (let i = 0; i < columnas.length; i++) {

        let td5 = document.createElement("td");
        td5.innerHTML = columnas[i];
        tr.appendChild(td5);
    };

    let td5 = document.createElement("td");
    td5.innerHTML = "Acciones";
    tr.appendChild(td5)

    let tbody = document.createElement("tbody");
    tab.appendChild(tbody);

    let keys = Object.keys(json[0]);
    console.log(keys)
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
        btn1.classList = "btn btn-primary";
        btn1.setAttribute("data-toggle", "modal");
        btn1.setAttribute("data-target", "#myModal");
        btn1.innerHTML="Editar";
        td1.appendChild(btn1);

        btn1.addEventListener("click", (ev => {
            editar(json.keys[0]);

        }));

        let btn2 = document.createElement("button");
        btn2.classList = "btn btn-danger";
        btn2.innerHTML="Eliminar";
        td1.appendChild(btn2)

       

        btn2.addEventListener("click", (ev => {
            borrar(json.keys[0]);

        }));

        $("#tabla").DataTable();
    }
    

    
}
/*Utilizadon la funcion ajax de Jquery borra un registro a la base de datos*/
function borrar(id) {
    let form = new FormData();
    form.append("IIDCURSO", id);

    let na = localStorage.getItem("na");
    if (na == 1) {
        voz("¿Seguro que quieres borrar?", true);
    }

    if (confirm("¿Seguro que quieres borrar?") == 1) {
        $.ajax({
            type: "POST",
            url: "/Curso/Eliminar",
            data: form,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data != 0) {
                    let na = localStorage.getItem("na");
                    // if (na == 1) {
                    //     voz("Registro borrado", true);
                    // }
                    document.getElementById("btncancelar").click();
                    inicio();

                }
            }
        })
    } 

}

/*Utilizadon la funcion get de Jquery obtiene un registro a la base de datos para edrtarlo*/
function editar(id) {
    let inputs = document.getElementsByClassName("obligatorio");
    for (let i = 0; i < inputs.length; i++) {
            inputs[i].parentNode.classList.remove("error");
    }
    let na = localStorage.getItem("na");
    if (id == 0) {
        borrarInput();
        // if (na == 1) {
        //     voz("Añadir", true);
        // }
        fun.innerHTML = "Añadir";
    } else {
        $.get(`/Curso/Recuperardatos?id=${id}`, (data) => {
            rellenarEditar(data);
                
        });
        // if (na == 1) {
        //     voz("Editar", true);
        // }
        fun.innerHTML = "Editar";
    }
};

/*Completa los campos del formulario al entrar en la funcion editar*/
function rellenarEditar(json) {
    let keys = Object.keys(json[0]);
    document.getElementById("txtID").value = json[0][keys[0]];
    document.getElementById("txtNom").value = json[0][keys[1]];
    document.getElementById("txtDescripcion").value = json[0][keys[2]];
}


/*Borra los datos del formulario*/
function borrarInput() {

    let inputs = document.getElementsByClassName("borrar");

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
            
    }

}

/*FUncion que se realiza al cargar la pagina que rellena la tabla*/
function inicio() {

    $("#fecha").datepicker(
        {
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true
        }
    );


    $.get("../operaciones/rebanoOperations.php?accion=0",
        function (data, textStatus, jqXHR) {

            tabla(["DNI", "NOMBRE"], data);
        }
    );



};

window.onload = inicio;