/**
 * Primera letra: Indica el tipo de entidad (A para sociedades anónimas, B para sociedades de responsabilidad limitada, etc.).
    7 dígitos: Números que identifican a la empresa.
    Carácter de control: Puede ser una letra o un número.
 * @param {*} cif 
 * @returns 
 */

export function validarCIF(cif){
    const regex = /^[A-HJ-NP-SUVW][0-9]{7}[0-9A-J]$/;
    return regex.test(cif);
}
export function validarDenominacionSocial(denominacionSocial){
    return denominacionSocial.length > 1
}
export function validarNombreComercial(cif){
    
}
export function validarNombre(cif){
    
}

export function validarEmail(cif){
    
}

export function validarContraseña(cif){
    
}
