//Funcion que se ejecuta al dar click al boton ingresar del login
$("#ingresar").click(function(event){
  event.preventDefault();//Previene que la etiqueta "a" ejecute el href
  //Se crean variables para guardar lo ingresado en los inputs del login
  var documento = document.getElementById("documento").value.trim();//Guarda la informacion del numero de cedula ingresado por el usuario
  var clave = document.getElementById("clave").value.trim();//Guarda la informacion de la contraseña ingresada por el usuario  
  var tipousuario = document.getElementById("tipousuario").value;//Guarda la informacion de la contraseña ingresada por el usuario  
  //Validacion que se encarga de evaluar las variables declaradas anteriormente
  //Valida si no estan vacias y si corresponden al tipo de dato solicitado
  //La variable "validar" se encuentra en el script de validacion.js
  //En la variable validar es como un arreglo que guarda los metodos que van a 
  //servir para validar las variables
  
  if( documento != '' && clave != '' && tipousuario!='') {
    //Encriptacion de las variables ingresadas por el usuario en base64    
    //Variable que se va a enviar po ajax
    cadena="documento=" + documento + "&clave=" + clave + "&tipousuario=" + tipousuario;
    $.ajax({
        type:"POST",//Metodo de envio
        url:"assets/controller/val_login.php",//Ruta destino a la cual se le va a enciar la variable
        data:cadena,//La informacion que se va a enviar a la ruta destino
        success:function(r){//Funcion que se ejecuta si se completa la peticion y retorna un valor
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                alertify.success('Logueado con exito :)');//Se le alerta al usuario que se logeado correctamente
                setTimeout(function(){ window.location = './assets/index.php';}, 1000);//Despues de 1 segundo se redirecciona a la pagina de administracion
            }else if(r==0){//Se valida si el valor retornado es igual a 0, pues esto es el resultado de la consulta sql, si el usuario no se encontro
              alertify.error('Usuario no encontrado o datos incorrectos');//Se le alerta al usuario que no se ha encontrado el usuario ingresado
            }else if(r=="consultaVacia"){//Se valida si el valor retornado es igual a consultaVacia, esto significaria que hubo un error en la consulta
              alertify.error('Consulta vacia');//Se le alerta al usuario que hubo un error con la consulta sql
            }
        }
    });  
  }else{
    alertify.error('Datos incorrectos');//Se le informa al usuario que los datos ingresados son incorrectos
  }
});

//Funcion que se ejecuta al dar click al boton ingresar del registro
$("#registrar").click(function(event){
  event.preventDefault();//Previene que la etiqueta "a" ejecute el href
  var resultado = 0;//Esta variable sera para guardar el dato que indicara si algun valor ha sido incorrecto
  //Se crean variables para guardar lo ingresado en los inputs del registro
  var cedula = document.getElementById("cedula").value.trim();//Guarda la informacion del numero de cedula ingresado por el usuario
  var name1 = document.getElementById("name1").value.trim();//Guarda la informacion del primer nombre ingresado por el usuario
  var name2 = document.getElementById("name2").value.trim();//Guarda la informacion del segundo nombre ingresado por el usuario
  var name3 = document.getElementById("name3").value.trim();//Guarda la informacion del priemr apellido ingresado por el usuario
  var name4 = document.getElementById("name4").value.trim();//Guarda la informacion del segundo apellido ingresado por el usuario  
  var password = document.getElementById("pass").value.trim();//Guarda la informacion de la contraseña ingresado por el usuario
  var password2 = document.getElementById("repetir").value.trim();//Guarda la informacion de la contraseña que tuvo que repetirel usuario
  //Validacion que se encarga de evaluar las variables declaradas anteriormente
  //Valida si no estan vacias y si corresponden al tipo de dato solicitado
  //La variable "validar" se encuentra en el script de validacion.js
  //En la variable validar es como un arreglo que guarda los metodos que van a 
  //servir para validar las variables
  if( name1 != '' &&  name3 != '' && cedula != '' && password != '' && password2 != ''
      && validar.numeroCedula(cedula) && validar.siEsLaMismaContrasenna(password, password2) 
      && validar.NombresApellidos(name1) && validar.NombresApellidos(name3) && validar.contrasenna(password)){
    //Encriptacion de las variables ingresadas por el usuario en base64
    cedula = btoa(cedula);
    name1 = btoa(name1);
    name3 = btoa(name3);
    password = btoa(password);
    cadena= "cedula=" + cedula + 
              "&name1=" + name1 +
              "&name3=" + name3 + 
              "&password=" + password;
    //Las siguientes validaciones verifican si los campo opcionales (segundo nombre y segundo appellido)
    //han sido ingresados correctamente para poder encriptarlos y enviarlos a registrar a la base de datos
    if(name2 != ''){//Si no esta vacio ingresa a validar
      if(validar.NombresApellidos(name2)){//Si la validacion retorna TRUE encripta la variable
        name2 = btoa(name2);
        cadena += "&name2=" + name2;//Se agrega el valor encriptado a la variable
      }else{//Si la validacion retorna FALSE entonces no se puede registrar el usuario
        resultado = 1;//Resultado pasaria a ser igual a 1, lo que significa queno se realizara el registro
      }      
    }
    if(name4 != ''){//Si no esta vacio ingresa a validar
      if (validar.NombresApellidos(name4)){//Si la validacion retorna TRUE encripta la variable
        name4 = btoa(name4);
        cadena += "&name4=" + name4;//Se agrega el valor encriptado a la variable
      }else{//Si la validacion retorna FALSE entonces no se puede registrar el usuario
        resultado = 1;//Resultado pasaria a ser igual a 1, lo que significa que no se realizara el registro
      }       
    }
    //Se valida que el resultado sea 0, lo que significa que las validaciones han salido exitosas (Han retornado TRUE)
    if (resultado == 0) {
        $.ajax({
        type:"POST",//Metodo de envio
        url:"assets/controller/val_register.php",//Ruta destino a la cual se le va a enciar la variable
        data:cadena,//La informacion que se va a enviar a la ruta destino
        success:function(r){//Esta funcion recibe el valor retornado de la ruta destino
          if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
              alertify.success('Registrado con exito'); //Se le alerta al usuario que el usuario ha sido registrado con exito  
              setTimeout(function(){ window.location = 'index.php';}, 1000);//Se espera 1 segundo para mostrar la alerta para redireccionarlo al login
          }else if(r==2){//Si el resultado de la ruta destino es distinto a 1, entonces es porque hubo un problema al registrarse
            alertify.error('El usuario ya existe');//Se alerta al usuario que no se pudo registrar
          }else{
            alertify.error('No se pudo registrar');//Se alerta al usuario que no se pudo registrar
          }
        }
      });
    } else {
      alertify.notify('Los datos ingresados son incorrectos', 'alert', 5);//Se alerta al usuario que los datos ingresados son incorrectos
    }
  }else{
    alertify.notify('Los datos ingresados son incorrectos', 'alert', 5);//Se alerta al usuario que los datos ingresados son incorrectos
  }
});



