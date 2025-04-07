
// EMPRESA
/**
 * Primera letra: Indica el tipo de entidad (A para sociedades anónimas, B para sociedades de responsabilidad limitada, etc.).
    7 dígitos: Números que identifican a la empresa.
    Carácter de control: Puede ser una letra o un número.
 * @param {*} cif 
 * @returns 
 */

export function validarCIF(cif) {
  const regex = /^[A-HJ-NP-SUVW][0-9]{7}[0-9A-J]$/;
  return regex.test(cif);
}
export function validarDenominacionSocial(denominacionSocial) {
  return denominacionSocial.length > 1;
}
export function validarNombreComercial(nombreComercial) {
  return nombreComercial.length > 1;
}
export function validarDireccion(direccion) {
  return direccion.length > 1;
}
export function validarTelefono(telefono) {
  return telefono.length === 9;
}
export function validarPersona(persona) {
  return persona.length > 1;
}
export function validarEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}
export function validarContra(contra) {
    return contra.length >= 8;
}


//EMPLEADO
export function validarNombre(nombre_empleado){
  return nombre_empleado.length > 1 && !/[0-9]/.test(nombre_empleado);
}

export function validarApellidos(apellidos_empleado){
  return apellidos_empleado.length > 1 && !/[0-9]/.test(apellidos_empleado);
}

export function validarDNI(dni){
  const cadena = 'TRWAGMYFPDXBNJZSQVHLCKE';
  dni = dni.trim();
  let letraCorresp='';
  let letra = String(dni.slice(8)).toUpperCase();
  let numero = Number(dni.slice(0,8));
  let resto = numero % 23;
  for(i=0; i<cadena.length; i++){
    if(resto==i){
      letraCorresp = cadena[i];
    }
  }
  if(letra==letraCorresp){
      return true;
  }else{
      return false;
  }
}

export function fechaNacimiento(){
  const regex = /^\d{4}-\d{2}-\d{2}$/;

  if (!regex.test(fecha)) {
      return false;
  }

  const [anio, mes, dia] = fecha.split('-').map(Number);

  const fechaObj = new Date(anio, mes - 1, dia);

  return fechaObj.getFullYear() === anio && 
          fechaObj.getMonth() === mes - 1 && 
          fechaObj.getDate() === dia;
}