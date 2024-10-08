const formulario = document.getElementById("formulario");
console.log("hola");

formulario.addEventListener('submit', (e) =>{
    
    if(nombre() || marca() || modelo() || precio() || detalles() || unidades()){
        e.preventDefault();
    }
    imagen();
});

function nombre(){
    let nombre = document.getElementById("nombre").value;
    let nom = document.getElementById("nom");
    if(nombre.length > 100){
        console.log(nombre.length);
        nom.textContent = "El nombre tiene que ser de máximo de 100 caracteres";
        return true;
    }else{
        console.log(nombre.length);
        nom.textContent = "";
        return false;
    }
}

function marca(){
    let marca = document.getElementById("opcionesMarca");
    let opcion = marca.options[document.getElementById('opcionesMarca').selectedIndex].text;;
    let error = document.getElementById("mar");
    if(opcion == ""){
        error.textContent = "Selecciona una marca";
        return true;
    }else{
        error.textContent = "";
        return false;
    }
}

function modelo(){
    let modelo = document.getElementById("modelo").value;
    let error = document.getElementById("mod");
    let regex = /^[a-zA-Z0-9]{1,25}$/; // Expresión regular
    if(modelo.length > 25 || regex.test(modelo) == false){
        error.textContent = "La marca debe tener menos de 25 caracteres y ser alfanumerica";
        return true;
    }else{
        console.log("bien modelo");
        error.textContent = "";
        return false;
    }
}

function precio(){
    let precio = document.getElementById("precio").value;
    let error = document.getElementById("pre");
    if(Number(precio) < 99.99){
        error.textContent = "El precio debe ser mayor a 99.99";
        return true;
    }else{
        console.log("precio bien");
        error.textContent = "";
        return false;
    }
}

function detalles(){
    let detalles = document.getElementById("detalles").value;
    let error = document.getElementById("det");
    error.textContent = "";
    if(detalles!= ""){
        if(detalles.length > 255){
            error.textContent = "Los detalles tienen un maximo de 255 caracteres";
            return true;
        }
    }
    return false;
}

function unidades(){
    let unidades = document.getElementById("unidades").value;
    let error = document.getElementById("det");
    if(Number(unidades) < 0){
        error.textContent = "El numero de unidades del producto debe ser igual o mayor a cero";
        return true;
    }else{
        console.log("uni bien");
        error.textContent = "";
        return false;
    }
}

function imagen(){
    let imagen = document.getElementById("imagen").value;
    if(imagen == ""){
        document.getElementById("imagen").value = "defecto.png";
    }
}