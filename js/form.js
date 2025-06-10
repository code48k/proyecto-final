function nombreCompleto(){ /* FUNCION QUE CONCATENA EL NOMBRE, APELLIDOS1 Y APELLIDOS 2. */
    const nombre = document.querySelector("#txtNombre").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'nombre' */
    const apellidos1 = document.querySelector("#txtApellido1").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'apellidos1' */
    const apellidos2 = document.querySelector("#txtApellido2").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'apellidos2' */
    const resultado = nombre + " " + apellidos1 + " " + apellidos2; /* CONCATENAMOS EN UN INPUT DESACTIVADO LAS VARIABLES. */
    document.querySelector("#txtNombreCompleto").value = resultado; /* PINTAMOS EL RESULTADO EN EL INPUT 'disabled' */
}

function datosPersonales(){ /* FUNCION QUE MUESTRA EN UN INPUT LOS VALORES INTRODUCIDOS EN DNI, TELÉFONO Y EMAIL. */
    const dni = document.querySelector("#txtDNI").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'dni' */
    const telefono = document.querySelector("#txtTelefono").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'telefono' */
    const email = document.querySelector("#txtEmail").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'email' */
    const resultado = `DNI: ${dni}${letra} | TEL: ${telefono} | EMAIL: ${email}`; /* CONCATENAMOS EN UN INPUT DESACTIVADO LAS VARIABLES. */
    
    document.querySelector("#txtDatosUsuario").value = resultado; /* PINTAMOS EL RESULTADO EN EL INPUT 'disabled' */
}

// VALIDACIONES DEL FORMULARIO

function iluminaNombre(){
	document.querySelector("#txtNombre").style.boxShadow = "0 0 2px 2px blue";
}

function iluminaApellidos1(){
	document.querySelector("#txtApellido1").style.boxShadow = "0 0 2px 2px blue";
}

function iluminaApellidos2(){
	document.querySelector("#txtApellido2").style.boxShadow = "0 0 2px 2px blue";
}

function iluminaDni(){
	document.querySelector("#txtDNI").style.boxShadow = "0 0 2px 2px blue";
}

function iluminaTelefono(){
	document.querySelector("#txtTelefono").style.boxShadow = "0 0 2px 2px blue";
}

function iluminaEmail(){
	document.querySelector("#txtEmail").style.boxShadow = "0 0 2px 2px blue";
}

function resetNombre(){
	document.querySelector("#txtNombre").value = "";
}

// function compruebaDatosUsuario(){ /* FUNCIÓN PARA COMPROBAR DNI. */
//      const dniInput = document.querySelector("#txtDNI").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'dniInput' */
//      const telefono = document.querySelector("#txtTelefono").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'telefono' */
//      const email = document.querySelector("#txtEmail").value; /* RECOGEMOS EL VALOR EN EL INPUT Y LO PASAMOS A UNA VARIABLE LLAMADA 'email' */

//      /* COMPROBACIÓN DE LAS LETRAS DEL DNI. */

//      const letras = "TRWAGMYFPDXBNJZSQVHLCKE"; 
//      const resto = parseInt(dniInput, 10) % 23;
//      const letra = letras[resto];
//      const dniCompleto = dniInput + letra;

//      document.querySelector("#txtDatosUsuario").value = `DNI: ${dniCompleto} | TEL: ${telefono} | EMAIL: ${email}`; /* PINTAMOS EN EL INPUT 'txtDatosUsuario'*/
// }

     document.querySelector("#boton2").addEventListener("click", function (){ /* FUNCIÓN PARA BORRAR LOS DATOS DEL FORMULARIO PARTE DE 'txtNombreCompleto' */
     document.querySelector("#txtNombreCompleto").value = "";
     });

     document.querySelector("#boton2").addEventListener("click", function (){ /* FUNCIÓN PARA BORRAR LOS DATOS DEL FORMULARIO PARTE DE 'txtDatosUsuario' */
     document.querySelector("#txtDatosUsuario").value = "";
     });


function compruebaDatosUsuario(){ /* FUNCIÓN PARA COMPROBAR DNI Y NIE. */
     const dniRaw = document.querySelector("#txtDNI").value.toUpperCase();
     const telefono = document.querySelector("#txtTelefono").value;
     const email = document.querySelector("#txtEmail").value;
     const letras = "TRWAGMYFPDXBNJZSQVHLCKE";

     const sustitutos = { X: "0", Y: "1", Z: "2" };
     let numero = dniRaw.replace(/^([XYZ])/, (letra) => sustitutos[letra]).slice(0, 8);

     const letra = letras[parseInt(numero) % 23];
     const dniCompleto = numero + letra;

     document.querySelector("#txtDatosUsuario").value = `DNI/NIE: ${dniCompleto} | TEL: ${telefono} | EMAIL: ${email}`;

}

