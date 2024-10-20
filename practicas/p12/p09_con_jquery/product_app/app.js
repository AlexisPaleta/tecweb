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