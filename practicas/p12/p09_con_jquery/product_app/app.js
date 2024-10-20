// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(function() {
    //Esta funcion se ejecuta apenas carga la pagina, se hace una peticion GET al servidor para obtener la lista de productos
    listarProductos(); //Se listan los productos nuevamente, para que se muestren en la tabla incluso si se agrega un producto
    
    $('#product-result').hide();//Se oculta el contenedor de productos al cargar la pagina
    $('#buscar').click(function(e) { //Cuando se haga click en el boton de buscar, se ejecuta la funcion
        e.preventDefault();//Se previene el comportamiento por defecto del boton
        let search = $('#search').val();

        if(search == ""){//Si el campo de busqueda esta vacio, no se hace nada
            $('#product-result').hide();
            listarProductos();
            return;
        }

        $.ajax({ //Este es el metodo que usa JQUERY para hacer peticiones AJAX, se definen los parametros de la peticion en un objeto, en AJAX puro es lo de usar el objeto XMLHttpRequest
            url: 'backend/product-search.php',
            type: 'GET',
            data: {search: search}, //Se envia el parametro de busqueda al servidor
            success: function(response) {

                if(response == "[]"){//Si la respuesta es un JSON vacio, no se muestra nada
                    $('#product-result').hide();
                    return;
                }
                let productos = JSON.parse(response);//Se convierte la respuesta a un objeto JSON, ya que la respuesta es un string
                let template = '';//Se crea una variable para guardar el HTML que se va a generar
                productos.forEach(producto => {//Se recorre el JSON de productos obtenido de la busqueda, eso para poder trabajar con cada uno de los productos retornados
                    template += `<li>
                        ${producto.nombre}
                    </li>`;//Se genera el HTML de cada producto
                });

                
                

                $('#product-result').show();//Se muestra el contenedor de productos
                $('#container').html(template);//Se inserta el HTML generado en el contenedor de productos

                template = ''; //Se limpia el template para poder generar el HTML de los productos en la tabla
                productos.forEach(producto => {
                    template += `<tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td>
                            <ul>
                                <li>Precio: ${producto.precio}</li>
                                <li>Unidades: ${producto.unidades}</li>
                                <li>Modelo: ${producto.modelo}</li>
                                <li>Marca: ${producto.marca}</li>
                                <li>Detalles: ${producto.detalles}</li>
                            </ul>
                        </td>
                    </tr>`;
                });
                $('#products').html(template);//Se inserta el HTML generado en la tabla de productos

            },
        });
        
    });

    // SE AGREGA UN PRODUCTO
    $('#product-form').submit(function(e) {
        e.preventDefault(); // Se previene el comportamiento por defecto del formulario
        
        // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
        let productoJsonString = $('#description').val();
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let finalJSON = JSON.parse(productoJsonString);
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        finalJSON['nombre'] = $('#name').val();
        // SE OBTIENE EL STRING DEL JSON FINAL

        //Validaciones de los datos de los productos a ingresar, en caso de que alguno no sea correcto se muestra
        //un mensaje de alerta y se detiene la ejecución de la función
        if(nombre(finalJSON['nombre']) || marca(finalJSON['marca']) || modelo(finalJSON['modelo']) || precio(finalJSON['precio']) || detalles(finalJSON['detalles']) || unidades(finalJSON['unidades'])){
            return;
        }

        finalJSON = JSON.stringify(finalJSON);//Se convierte el JSON final a un string para poder enviarlo al servidor, ya que en el servidor se reconvierte luego a JSON
        $.post('backend/product-add.php', finalJSON, function(response) {//Se hace una peticion POST al servidor con el JSON del producto a agregar
            console.log(response);//Se imprime la respuesta del servidor en la consola
        });
        listarProductos();

    });

    $(document).on('click', '.product-delete', function() { //Se agrega un evento de click a los botones de eliminar
        console.log('clicked');
    });
    
});

function listarProductos() {
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response) {
            let productos = JSON.parse(response);
            console.log(productos);
            let template = '';
            productos.forEach(producto => {
                template += `<tr>
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td>
                        <ul>
                            <li>Precio: ${producto.precio}</li>
                            <li>Unidades: ${producto.unidades}</li>
                            <li>Modelo: ${producto.modelo}</li>
                            <li>Marca: ${producto.marca}</li>
                            <li>Detalles: ${producto.detalles}</li>
                        </ul>
                    </td>
                    <td>
                        <button class="product-delete btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>`;
            });
            $('#products').html(template);
        }
    });
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