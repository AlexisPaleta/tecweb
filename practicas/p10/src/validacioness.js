const formulario = document.getElementById("formulario");
console.log("hola");

formulario.addEventListener('submit', (e) =>{
    e.preventDefault();
    nombre();
    marca();
    modelo();
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
    }else{
        error.textContent = "";
    }
}

function modelo(){
    let modelo = document.getElementById("modelo").value;
    let error = document.getElementById("mod");
    let regex = /^[a-zA-Z0-9]{1,25}$/; // Expresión regular
    if(modelo.length > 25 || regex.test(modelo) == false){
        error.textContent = "La marca debe tener menos de 25 caracteres y ser alfanumerica";
    }else{
        console.log("bien modelo");
        error.textContent = "";
    }
}

function precio(){
    
}
