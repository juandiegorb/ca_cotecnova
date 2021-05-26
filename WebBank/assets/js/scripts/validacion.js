//Arreglo que guarda funciones para validar
var validar = {
  numeroCedula:function(str) {//Funcion para validar numero de cedula
    var pattern = /^[0-9]{6,10}$/;//Este formato solo permite de 6 a 10 numeros positivos
    return pattern.test(str);  // returns a boolean (TRUE: Si se cumple el pattern, FALSE: Si no se cumple el pattern)
  },
  contrasenna:function(str){//Funcion para validar contraseña
    var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;//Este formato solo permite una cadena de 8 a 20 caracteres, que pueden ser letras mayusculas, minusculas y numeros.
    return pattern.test(str);  // returns a boolean (TRUE: Si se cumple el pattern, FALSE: Si no se cumple el pattern)
  },
  NombresApellidos:function(str){//Funcion para validar nombres y apellidos
    var pattern = /^[a-zA-Z]{2,20}$/;//Este formato solo permite una cadena de 8 a 20 caracteres, que pueden ser letras mayusculas,  minusculas
    return pattern.test(str);  // returns a boolean (TRUE: Si se cumple el pattern, FALSE: Si no se cumple el pattern)
  },
  monto:function(str){//Funcion para validar nombres y apellidos
    var pattern = /^[0-9]{3,7}$/;//Este formato solo permite una cadena de 8 a 20 caracteres, que pueden ser letras mayusculas,  minusculas
    return pattern.test(str);  // returns a boolean (TRUE: Si se cumple el pattern, FALSE: Si no se cumple el pattern)
  },
  siEsLaMismaContrasenna:function(str1,str2){//Funcion para validar si 2 contraseñas son iguales
      return str1 === str2;// returns a boolean (TRUE: Si se cumple la comparacion, FALSE: Si no se cumple la comparacion)
  }
};   