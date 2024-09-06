function agregarTarea(){

    //Obtener el dato ingresado del input:
    let tareaIngresada = document.getElementById("ingresoTarea").value;

    //Validacion de tarea ingresada:
    if(tareaIngresada === ""){
        alert("No puede dejar el campo vacio.\nPor favor ingrese una Tarea");
        return;
    }

    //Obtener la lista:
    let listaTareas = document.getElementById("listaTareas");

    //Crear los elementos item y contenido del item:
    let itemLista = document.createElement("li");
    let contenidoItem = document.createTextNode(tareaIngresada);

    //Crear boton eliminar:
    let botonEliminar = document.createElement("button");
    botonEliminar.textContent = "Eliminar"; //Alternativa a createTextNode
    botonEliminar.onclick = function(){itemLista.remove()}
    botonEliminar.classList.add("buttonEliminar");

    //Agregar elementos al documento HTML:
    itemLista.appendChild(contenidoItem);
    itemLista.appendChild(botonEliminar);
    listaTareas.appendChild(itemLista);

    //Limpiar el input de ingreso de Tarea:
    document.getElementById("ingresoTarea").value = "";
}


