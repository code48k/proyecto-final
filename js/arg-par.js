let nombre = "Lucas";

function obtenerNombre(superNombre){
    let apellidos = "Del amo";
    let apellidos2 = "1";
    let apellidos3 = "2";
    let apellidos4 = "3";
    imprimirNombreCompleto(superNombre, apellidos, apellidos2);
    
}


function imprimirNombreCompleto(jajajaj, superAjejejejepellidos, apelli){
    console.log(`Mi nombre es ${jajajaj} y mi apellido es ${superAjejejejepellidos}`);
    
}

obtenerNombre(nombre);

// ---------------------------------------------------------------------------------------------------------------------

/*

CREA UN PROGRAMA EL SE USEN USERS DOS FUNCIONES ANIDADAS(En las llamadas), EN LA PRIMERA FUNCIÓN SE DEBEN CREAR DOS VARIABLES LOCALES DE TIPO NÚMERICO . LA PRIMERA FUNCIÓN SE LLAMARA OPERAR, Y LA SEGUNDA FUNCIÓN SE ENCARGARA DE REALIZAR LA MULTIMPLICACIÓN DE AMBOS NÚMEROS, SE LLAMARA MULTIPLICAR.


*/

function operar(){

    let num1 = 5;
    let num2 = 8;

    multiplicar(num1, num2);


}

function multiplicar(numero1, numero2){

    let resultado = numero1 * numero2;

    console.log(`${resultado}`);
}