// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var consulta = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            console.log(productos);
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("consulta="+consulta);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO

    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL

    if(nombre(finalJSON['nombre']) || marca(finalJSON['marca']) || modelo(finalJSON['modelo']) || precio(finalJSON['precio']) || detalles(finalJSON['detalles']) || unidades(finalJSON['unidades'])){
        return;
    }

    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

function buscarProducto(e){
    e.preventDefault(); // Evita que el formulario se envíe y que se recargue la página, o mas bien que se vaya a la pagina de read.php

    //Esta busqueda funciona para cuando el usuario ingrese al menos una parte del nombre del producto, o una parte de los detalles de este
    var consulta = document.getElementById('search').value;//Se recupera la cadena que con la que el usuario quiere buscar los productos

    
    let client = getXMLHttpRequest();//Se crea el objeto de conexión asincrónica al servidor, para que de esta forma se pueda obtener la respuesta del servidor sin la
    //necesidad de tener que recargar toda la pagina
    //client.addEventListener('readystatechange', metodo(this)); //una forma de hacer que el objeto client ejecute el metodo metodo cada vez que cambie su estado es agregando un listener
    //ya que en la forma anterior del metodo buscarID, se utilizaba el onreadystatechange, pero en este caso se utilizara el addEventListener, la diferencia esta en que
    //el addEventListener permite agregar mas de un listener a un objeto, mientras que el onreadystatechange solo permite agregar uno
    client.open('POST', './backend/read.php', true);//Se define la forma en la que se va a enviar la peticion, el true sirve para decir que es asincrona, si se pone false
    //funciona practicamente como una peticion http comun y corriente
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//Se especifica lo que se esta enviando, en este caso  son datos de formulario, 
    //Es especialmente útil cuando los datos que se envían son de tipo texto y no contienen caracteres especiales que necesiten ser codificados. 
    client.onreadystatechange = function () {
        if(client.readyState == 4 && client.status == 200){
             //El this en este caso hace referencia al objeto client, puede hacer referencia a el porque el metodo definido en el listener de arriba
            //es llamado por el objeto client, por lo que el this hace referencia a el. El qe el readState sea 4 hace que se verifique que la peticion Http se ha completao, y el 
            //status de 200 indica que la peticion fue exitosa
            
            //Ahora, ya que se aseguro que el estado de la peticion fue exitoso, se procede a obtener la respuesta del servidor
            let productos = JSON.parse(client.responseText);//Se convierte la respuesta del servidor a un objeto JSON, el archivo read.php devuelve un JSON pero serializado, es decir
            //es un string, por lo que se debe convertir a un objeto JSON para poder manipularlo, eso se logra con el JSON.parse, el que se serialicen los datos es para poder permitir
            //que los datos viajen por la red de una forma mas eficiente, ya que los strings son mas faciles de transmitir que los objetos JSON, solo que se tienen que enviar serializados
            //y cuando se quieran recibir para trabajar con ellos se deben deserializar
    
            //Se verifica si el objeto JSON tiene datos, es decir si se encontro algun producto con la busqueda
            if(Object.keys(productos).length > 0) {
    
                if(productos["error"] == 'No se encontraron resultados'){
                    //En caso de que no se haya encontrado ningun producto con la busqueda, se le informa al usuario que no se encontro ningun producto con la busqueda
                    alert("No se encontro ningun producto con la busqueda realizada");
                }else{
                    let contenidoTabla = '';

                    // Usando forEach para iterar sobre los productos
                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = `
                            <li>precio: ${producto.precio}</li>
                            <li>unidades: ${producto.unidades}</li>
                            <li>modelo: ${producto.modelo}</li>
                            <li>marca: ${producto.marca}</li>
                            <li>detalles: ${producto.detalles}</li>
                        `;

                        // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                        contenidoTabla += `
                            <tr>
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;
                    });

                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    document.getElementById("productos").innerHTML = contenidoTabla;
    
                }
            }
        }
    }   

    

    client.send("consulta="+consulta);//Se envia la cadena que va a ser revisada en read.php, se manda en el cuerpo de la solicitud Http
}

function metodo(){//Esee metodo es cuando se usa el eventListener
    if(this.readyState == 4 && this.status == 200){ //El this en este caso hace referencia al objeto client, puede hacer referencia a el porque el metodo definido en el listener de arriba
        //es llamado por el objeto client, por lo que el this hace referencia a el. El qe el readState sea 4 hace que se verifique que la peticion Http se ha completao, y el 
        //status de 200 indica que la peticion fue exitosa
        
        //Ahora, ya que se aseguro que el estado de la peticion fue exitoso, se procede a obtener la respuesta del servidor
        let productos = JSON.parse(this.responseText);//Se convierte la respuesta del servidor a un objeto JSON, el archivo read.php devuelve un JSON pero serializado, es decir
        //es un string, por lo que se debe convertir a un objeto JSON para poder manipularlo, eso se logra con el JSON.parse, el que se serialicen los datos es para poder permitir
        //que los datos viajen por la red de una forma mas eficiente, ya que los strings son mas faciles de transmitir que los objetos JSON, solo que se tienen que enviar serializados
        //y cuando se quieran recibir para trabajar con ellos se deben deserializar

        //Se verifica si el objeto JSON tiene datos, es decir si se encontro algun producto con la busqueda
        if(Object.keys(productos).length > 0) {

            if(productos["error"] == 'No se encontraron resultados'){
                //En caso de que no se haya encontrado ningun producto con la busqueda, se le informa al usuario que no se encontro ningun producto con la busqueda
                alert("No se encontro ningun producto con la busqueda realizada");
            }else{
                let i = 0;
                let descripcion = '';
                let template = '';
                while(productos[i] != undefined){
                     // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    descripcion = '';
                    descripcion += '<li>precio: '+productos[i].precio+'</li>';
                    descripcion += '<li>unidades: '+productos[i].unidades+'</li>';
                    descripcion += '<li>modelo: '+productos[i].modelo+'</li>';
                    descripcion += '<li>marca: '+productos[i].marca+'</li>';
                    descripcion += '<li>detalles: '+productos[i].detalles+'</li>';
                
                    // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                    template += `
                        <tr>
                            <td>${productos[i].id}</td>
                            <td>${productos[i].nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                    i++;
                }

            }
            
            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
            document.getElementById("productos").innerHTML = template;
        }
    }
}

function nombre(nom){

    if(nom.length > 100 || nom.length==0){

        alert("El nombre debe tener de 1 a 100 caracteres")
        return true;
    }else{
        return false;
    }
}

function marca(mar){
    let marcas = {
        "Cheetos":1,
        "Sabritas":2,
        "Takis":3,
        "Chips":4,
        "Doritos":5,
        "Ruffles":6
    };
    if(marcas[mar] == undefined){
        alert("La marca debe ser valida");
        return true;
    }else{
        return false;
    }
}

function modelo(model){
    let regex = /^[a-zA-Z0-9]{1,25}$/; // Expresión regular
    if(model.length > 25 || regex.test(model) == false){
        alert("El modelo debe de ser de menos de 25 caracteres y tener caracteres validos");
        return true;
    }else{
        return false;
    }
}

function precio(precio){
    if(Number(precio) < 99.99){
        alert("El precio debe ser mayor a 99.99");
        return true;
    }else{
        return false;
    }
}

function detalles(detalles){
    if(detalles!= ""){
        if(detalles.length > 255){
            alert("Los detalles tienen un maximo de 255 caracteres");
            return true;
        }
    }
    return false;
}

function unidades(unidades){
    if(Number(unidades) < 0){
        alert("El numero de unidades del producto debe ser igual o mayor a cero");
        return true;
    }else{
        return false;
    }
}