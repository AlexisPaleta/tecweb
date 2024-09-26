function getDatos(){
    var nombre = window.prompt("Nombre:","");
    var edad = window.prompt("Edad:","");

    var div1 = document.getElementById("nombre");
    div1.innerHTML = "<h3> Nombre:" + nombre + " </h3>";

    var div2 = document.getElementById("edad");
    div2.innerHTML = "<h3> Edad:"+ edad + " </h3>";
}

function Ejemplo1(){
    var div = document.getElementById("Ejemplo1");
    div.innerHTML = 'Hola Mundo';
}

function Ejemplo2(){
    var nombre = "Juan";
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div = document.getElementById("Ejemplo2");

    div.innerHTML = nombre;
    div.innerHTML += "<br>";
    div.innerHTML += edad ;
    div.innerHTML += "<br>";
    div.innerHTML += altura;
    div.innerHTML += "<br>";
    div.innerHTML += casado;
}

function Ejemplo3(){
    var nombre;
    var edad;
    nombre = prompt("Ingresa tu nombre:", "");
    edad = prompt("Ingresa tu edad:", "");

    var div = document.getElementById("Ejemplo3");
    div.innerHTML ="Hola ";
    div.innerHTML += nombre;
    div.innerHTML += " así que tienes ";
    div.innerHTML += edad ;
    div.innerHTML += " años";
}

function Ejemplo4(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');

    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);

    var div = document.getElementById("Ejemplo4");

    div.innerHTML ='La suma es ';
    div.innerHTML +=suma;
    div.innerHTML +='<br>';
    div.innerHTML +='El producto es ';
    div.innerHTML +=producto;
}

function Ejemplo5(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    var div = document.getElementById("Ejemplo5");
    if (nota>=4) {
        div.innerHTML =nombre+' esta aprobado con un '+nota;
    }
}

function Ejemplo6(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var div = document.getElementById("Ejemplo6");

    if (num1>num2) {
    div.innerHTML +='el mayor es '+num1;
    }
    else {
    div.innerHTML +='el mayor es '+num2;
    }
}

function Ejemplo7(){
    var nota1,nota2,nota3;
    var div = document.getElementById("Ejemplo7");

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        div.innerHTML +='aprobado';
        }
    else {
        if (pro>=4) {
        div.innerHTML +='regular';
        }
        else {
        div.innerHTML +='reprobado';
        }
    }
}

function Ejemplo8(){
    var valor;
    var div = document.getElementById("Ejemplo8");
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: div.innerHTML +='uno';
            break;
        case 2: div.innerHTML +='dos';
            break;
        case 3: div.innerHTML +='tres';
            break;
        case 4: div.innerHTML +='cuatro';
            break;
        case 5: div.innerHTML +='cinco';
            break;
        default:div.innerHTML +='debe ingresar un valor comprendido entre 1 y 5.';
    }
}

function Ejemplo9(){
    var col;
    var div = document.getElementById("Ejemplo9");
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
        case 'rojo': document.bgColor='#ff0000';
            break;
        case 'verde': document.bgColor='#00ff00';
            break;
        case 'azul': document.bgColor='#0000ff';
            break;
    }
}

function Ejemplo10(){
    var x;
    var div = document.getElementById("Ejemplo10");
    x=1;
    while (x<=100) {
        div.innerHTML +=x;
        div.innerHTML +='<br>';
        x=x+1;
    }
}

function Ejemplo11(){
    var x=1;
    var div = document.getElementById("Ejemplo11");
    var suma=0;
    var valor;
    while (x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    div.innerHTML +="La suma de los valores es "+suma+"<br>";
}

function Ejemplo12(){
    var div = document.getElementById("Ejemplo12");
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        div.innerHTML +='El valor '+valor+' tiene ';
    if (valor<10)
        div.innerHTML +='Tiene 1 dígitos';
    else
    if (valor<100) {
        div.innerHTML +='Tiene 2 dígitos';
    }
    else {
        div.innerHTML +='Tiene 3 dígitos';
    }
        div.innerHTML +='<br>';
    }while(valor!=0);
}

function Ejemplo13(){
    var div = document.getElementById("Ejemplo13");
    var f;
    for(f=1; f<=10; f++)
    {
        div.innerHTML +=f+" ";
    }
}

function Ejemplo14(){
    
}

function Ejemplo15(){
    
}

function Ejemplo16(){
    
}

function Ejemplo17(){
    
}

function Ejemplo18(){
    
}