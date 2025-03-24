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
export function validarCiudad(ciudad) {
  return ciudad.length > 1;
}
export function validarProvincia(provincia) {
  return provincia.length > 1;
}
export function validarCP(cp) {
  return cp.length === 5;
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
