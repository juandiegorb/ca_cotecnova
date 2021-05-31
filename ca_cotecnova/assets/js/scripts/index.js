//Esta es un funcion que encapsula procedimientos jQuery
(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
            /*====================================
            METIS MENU - Menu desplegable
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR - Diseño responsive del menu lateral izquierdo
              Lo que hace es ocultar o mostrar el menu
           ======================================*/
            $(window).bind("load resize", function () {
                //Cuando la pantalla reduce su tamaño menos de 768pixeles
                //Se agrega una clase para ocultar el menu, de lo contrario remueve 
                //la clase para poder mostrarlo
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
        },

        //Esta funcion corresponde al Metis menu 
        //Oculta o muestra el menu lateral izquierdo, segun el tamaño 
        //que se encuentre la ventana
        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///
    //Cuando el documento se encuentra cargado, se inicializa 
    //La funcion que hace que el menu se muestre
    //Ademas carga en la etiqueta con id view, la presentacion 
    $(document).ready(function () {
        mainApp.main_fun();
        $("#view").load("./pages/inicio.php");
    });
    

}(jQuery));

//Esta funcion es la encargada de cerrar sesion
//Esto ocurre con evento click
//Cuando se oprima la etiqueta con id cerrar_sesion
//Se ejecuta el procedimiento de cerrar la sesion
$('#cerrar_session').click(function() {
    //Alertifi confirm, muestra una alerta que srve para confirmar
    //el cierre de sesion, lo que hace esta alerta es ejecutar una funcion
    //segun lo que el usuario escoja
    alertify.confirm('Cerrar Sesion', '¿Esta seguro que desea cerrar sesion?',
    //Esta funcion es ejecutada cuando el usuario confirma el cierre de sesion 
    function(){ 
        //Lo que hace esta funcion es mandar por el metodo POST al 
        //login (que esta hubicado en ../index.php ), envia una variable 
        //de cierre de sesion, y en el index se valida si la varible se ha enviado
        //para proceder con el cierre y destruccion de la sesio
        cadena="cerrar_session=" + 1;//Variable de cierre de sesion
        $.ajax({
            type:"POST",//Metodo de envio
            url:"../index.php",//Ruta destino a la cual se le va a enciar la variable
            data:cadena,//La informacion que se va a enviar a la ruta destino
            success:function(){//Funcion que se ejecuta si se completa la peticion 
                alertify.success("Sesion cerrada!");//Se le alerta al usuario que la sesion ha sido cerrada
                setTimeout('location.reload()',1000);//Se espera 1 segundo para mostrar la alerta para despues recargar la pagina
            }
        });
    }
    //Esta funcion es ejecutada cuando el usuario cancela el cierre de sesion
    ,function(){ alertify.error('Cancelado')});
    
});

/*======================================================
    FUNCIONES QUE CAPTURAN LOS CLICK DEL MENU LATERAL
                        IZQUIERDO
========================================================*/

//Array que contiene los id de los procedimientos que ejecuta el menu lateral
var ids = ['inicio','gestionardocente','gestionarestudiante','gestionarhorario','gestionaraula','gestionarmateria','gestionarcarrera'];
//Se captura en variables los id del array
var inicio = document.getElementById(""+ids[0]+"");
var gestionardocente = document.getElementById(""+ids[1]+"");
var gestionarestudiante = document.getElementById(""+ids[2]+"");
var gestionarhorario = document.getElementById(""+ids[3]+"");
var gestionaraula = document.getElementById(""+ids[4]+"");
var gestionarmateria = document.getElementById(""+ids[5]+"");
var gestionarcarrera = document.getElementById(""+ids[6]+"");

//Funcion que se ejecutal al dar click en la opcion del menu inicio
inicio.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    $("#view").load("pages/inicio.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
//    for (var i = 0; i < ids.length; i++) {
//        if (ids[i] == ids[0]) {//Si verdadero, se agrega la clase active-menu
//            $("#"+ids[i]+"").addClass("active-menu");
//        }else{//De lo contrrio, le quita la clase active-menu
//            $("#"+ids[i]+"").removeClass("active-menu")
//        }
//    }//La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

gestionardocente.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    $("#view").load("pages/gestionardocente.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[0]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }//La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

/*====================================
    FUNCIONES
======================================*/

//Funcion que hace que haga que se devulva a la presentacion
function cancelar(){ 
    $("#view").load("pages/inicio.php");//Cargar en la etiqueta con id view la vista solicitada
};
// Muestra la pagina de docente
function crear_docente(){
    $("#view").load("pages/crear_docente.php");//Cargar en la etiqueta con id view la vista solicitada
}
//muestra la pagina de editar
function editar_docente(id){ 
    $("#view").load("pages/editar_docente.php?id="+id);//Cargar en la etiqueta con id view la vista solicitada
};

//muestra la pagina de editar
function eliminar_docente(id){ 
    $("#view").load("pages/eliminar_docente.php?id="+id);//Cargar en la etiqueta con id view la vista solicitada
};

function crearDocente(){
  event.preventDefault();//Previene que la etiqueta "a" ejecute el href
  //Se crean variables para guardar lo ingresado en los inputs del login
  var documento = document.getElementById("numerodocumento").value.trim();//Guarda la informacion del numero de cedula ingresado por el usuario
  var nombres = document.getElementById("nombres").value.trim();//Guarda la informacion de la contraseña ingresada por el usuario  
  var apellidos = document.getElementById("apellidos").value.trim();
  var clave = document.getElementById("clave").value.trim();
  if( documento != '' && nombres != '' && apellidos!='' && clave!='') {
    //Encriptacion de las variables ingresadas por el usuario en base64    
    //Variable que se va a enviar po ajax
    cadena="documento=" + documento + "&nombres=" + nombres + "&apellidos=" + apellidos + "&clave=" + clave;
    $.ajax({
        type:"post",//Metodo de envio
        url:"controller/crearDocente.php",//Ruta destino a la cual se le va a enciar la variable
        data:cadena,//La informacion que se va a enviar a la ruta destino
        success:function(r){//Funcion que se ejecuta si se completa la peticion y retorna un valor
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                alertify.success('Registro exitoso :)');//Se le alerta al usuario que se logeado correctamente
                setTimeout(function(){ window.location = 'index.php';}, 1000);//Despues de 1 segundo se redirecciona a la pagina de administracion
            }else if(r==0){//Se valida si el valor retornado es igual a 0, pues esto es el resultado de la consulta sql, si el usuario no se encontro
              alertify.error('Error en la creacion de los datos');//Se le alerta al usuario que no se ha encontrado el usuario ingresado
              setTimeout(function(){ window.location = 'index.php';}, 1000);
            }
        }
    });  
  }else{
    alertify.error('Datos incorrectos');//Se le informa al usuario que los datos ingresados son incorrectos
  }    
}

function editarDocente(){
  event.preventDefault();//Previene que la etiqueta "a" ejecute el href
  //Se crean variables para guardar lo ingresado en los inputs del login  
  var id = document.getElementById("id").value;//Guarda la informacion del numero de cedula ingresado por el usuario
  var documento = document.getElementById("numerodocumento").value.trim();//Guarda la informacion del numero de cedula ingresado por el usuario
  var nombres = document.getElementById("nombres").value.trim();//Guarda la informacion de la contraseña ingresada por el usuario  
  var apellidos = document.getElementById("apellidos").value.trim();
  var clave = document.getElementById("clave").value.trim();
  if( id != '' && documento != '' && nombres != '' && apellidos!='' && clave!='') {
    //Variable que se va a enviar po ajax
    cadena="id=" + id + "&documento=" + documento + "&nombres=" + nombres + "&apellidos=" + apellidos + "&clave=" + clave;
    $.ajax({
        type:"post",//Metodo de envio
        url:"controller/editarDocente.php",//Ruta destino a la cual se le va a enciar la variable
        data:cadena,//La informacion que se va a enviar a la ruta destino
        success:function(r){//Funcion que se ejecuta si se completa la peticion y retorna un valor
            if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                alertify.success('Actualizacion exitosa :)');//Se le alerta al usuario que se logeado correctamente
                setTimeout(function(){ window.location = 'index.php';}, 1000);//Despues de 1 segundo se redirecciona a la pagina de administracion
            }else if(r==0){//Se valida si el valor retornado es igual a 0, pues esto es el resultado de la consulta sql, si el usuario no se encontro
              alertify.error('Error en la creacion de los datos');//Se le alerta al usuario que no se ha encontrado el usuario ingresado
              setTimeout(function(){ window.location = 'index.php';}, 1000);
            }
        }
    });  
  }else{
    alertify.error('Datos incorrectos');//Se le informa al usuario que los datos ingresados son incorrectos
  }    
}

function eliminarDocente(){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    //Se crean variables para guardar lo ingresado en los inputs del login  
    var id = document.getElementById("id").value;//Guarda la informacion del numero de cedula ingresado por el usuario
    var estado = document.getElementById("estado").value;//Guarda la informacion del numero de cedula ingresado por el usuario
    if( id != '' && estado != '' ) {
      //Variable que se va a enviar po ajax
      cadena="id=" + id + "&estado=" + estado;
      $.ajax({
          type:"post",//Metodo de envio
          url:"controller/eliminarDocente.php",//Ruta destino a la cual se le va a enciar la variable
          data:cadena,//La informacion que se va a enviar a la ruta destino
          success:function(r){//Funcion que se ejecuta si se completa la peticion y retorna un valor
              if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                  alertify.success('Eliminacion exitosa :)');//Se le alerta al usuario que se logeado correctamente
                  setTimeout(function(){ window.location = 'index.php';}, 1000);//Despues de 1 segundo se redirecciona a la pagina de administracion
              }else if(r==0){//Se valida si el valor retornado es igual a 0, pues esto es el resultado de la consulta sql, si el usuario no se encontro
                alertify.error('Error en la eliminacion');//Se le alerta al usuario que no se ha encontrado el usuario ingresado
                setTimeout(function(){ window.location = 'index.php';}, 1000);
              }
          }
      });  
    }else{
      alertify.error('Datos incorrectos');//Se le informa al usuario que los datos ingresados son incorrectos
    }    
  }
