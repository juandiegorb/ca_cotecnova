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
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[0]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }//La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

//Funcion que se ejecutal al dar click en la opcion del menu depositar
gestionardocente.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    //Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[1]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    $("#view").load("pages/tablas/tablareferenciadocentes.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $('#Tabladocente').DataTable( {
            "ajax": "pages/tablas/tablainformaciondocentes.php",
            "columns": [
                { "data": "documento" },
                { "data": "nombres" },
                { "data": "apellidos" },
                { "data": "tipousuario" }
            ]
        } );        
    },100);
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

//Funcion que se ejecutal al dar click en la opcion del menu retirar
retirar.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    $("#view").load("pages/retirar.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[2]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

//Funcion que se ejecutal al dar click en la opcion del menu cosultar
consultar.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    $("#view").load("pages/consultar.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[3]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

//Funcion que se ejecutal al dar click en la opcion del menu historial
historial.addEventListener("click", function(event){
    event.preventDefault();//Previene que la etiqueta "a" ejecute el href
    $("#view").load("pages/historial.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(
        '$("#transferencias").load("pages/tablas/tablatransferencias.php");'//Cargar en la etiqueta con id view la vista solicitada
    ,50);
    setTimeout(function() {
        $("#transferencias1").load("pages/tablas/tablatransferencia1.php");//Cargar en la etiqueta con id view la vista solicitada
        setTimeout(function() {
            $('#transacciont1').DataTable( {
                "ajax": "pages/tablas/informacionTablas1.php",
                "columns": [
                    { "data": "name" },
                    { "data": "position" },
                    { "data": "salary" },
                    { "data": "start_date" }
                ]
            } );
        },50);
        
    },100);
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[4]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
});

/*====================================
    FUNCIONES
======================================*/

function submittransferir(){
    var monto = document.getElementById("monto").value.trim();//Guarda la informacion del monto ingresado por el usuario
    var cuenta = document.getElementById("cuenta").value.trim();//Guarda la informacion de la cuenta ingresado por el usuario
    //Validacion que se encarga de evaluar las variables declaradas anteriormente
    //Valida si no estan vacias y si corresponden al tipo de dato solicitado
    //La variable "validar" se encuentra en el script de validacion.js
    //En la variable validar es como un arreglo que guarda los metodos que van a 
    //servir para validar las variables
    if( monto != '' &&  cuenta != '' && validar.monto(monto) && validar.numeroCedula(cuenta) && monto <= 2000000){
        cedula = btoa(cuenta);
        cadena= "cedula=" + cedula + 
                "&monto=" + monto;
        $.ajax({
            type:"POST",//Metodo de envio
            url:"controller/val_transaccion.php",//Ruta destino a la cual se le va a enciar la variable
            data:cadena,//La informacion que se va a enviar a la ruta destino
            success:function(r){//Esta funcion recibe el valor retornado de la ruta destino
                if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                    alertify.success('Registrado con exito'); //Se le alerta al usuario que el usuario ha sido registrado con exito  
                    setTimeout(function(){ 
                        $("#view").load("pages/consultar.php");//Cargar en la etiqueta con id view la vista solicitada
                        //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
                        //id de las opciones del menu lateral, este for lo que hara sera cambiar
                        //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
                        //presione alguna opcion, esta se quede seleccionada con el color rojo
                        for (var i = 0; i < ids.length; i++) {
                            if (ids[i] == ids[3]) {//Si verdadero, se agrega la clase active-menu
                                $("#"+ids[i]+"").addClass("active-menu");
                            }else{//De lo contrrio, le quita la clase active-menu
                                $("#"+ids[i]+"").removeClass("active-menu")
                            }
                        }
                    }, 1000);//Se espera 1 segundo para mostrar la alerta para redireccionarlo al login
                }else if(r==2){//Si el resultado de la ruta destino es distinto a 1, entonces es porque hubo un problema al registrarse
                    alertify.error('El usuario ya existe');//Se alerta al usuario que no se pudo registrar
                }else{
                    alertify.error('No se pudo realizar la transferencia');//Se alerta al usuario que no se pudo registrar
                }
            }
        });
    }else{
        alertify.error('Datos incorrectos');//Se alerta al usuario que no se pudo registrar
    }
};

//Funcion que hace que haga que se devulva a la presentacion
function cancelar(cancel){ 
    $("#view").load("pages/inicio.php");//Cargar en la etiqueta con id view la vista solicitada
};
//Funcion que se ejecutal al dar click en el boton transferir de la presentacion
function submitdepositar(){
    var monto1 = document.getElementById("monto1").value.trim();//Guarda la informacion del monto ingresado por el usuario
    //Validacion que se encarga de evaluar las variables declaradas anteriormente
    //Valida si no estan vacias y si corresponden al tipo de dato solicitado
    //La variable "validar" se encuentra en el script de validacion.js
    //En la variable validar es como un arreglo que guarda los metodos que van a 
    //servir para validar las variables
    if(monto1 != '' && validar.monto(monto1) && monto1 >= 1000 && monto1 <= 2000000){
        //cedula = btoa(cuenta);
        cadena1 = "monto=" + monto1;
        $.ajax({
            type:"POST",//Metodo de envio
            url:"controller/val_depositar.php",//Ruta destino a la cual se le va a enciar la variable
            data:cadena1,//La informacion que se va a enviar a la ruta destino
            success:function(r){//Esta funcion recibe el valor retornado de la ruta destino
                if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                    alertify.success('Registrado con exito'); //Se le alerta al usuario que el usuario ha sido registrado con exito  
                    setTimeout(function(){ 
                        $("#view").load("pages/consultar.php");//Cargar en la etiqueta con id view la vista solicitada
                        //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
                        //id de las opciones del menu lateral, este for lo que hara sera cambiar
                        //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
                        //presione alguna opcion, esta se quede seleccionada con el color rojo
                        for (var i = 0; i < ids.length; i++) {
                            if (ids[i] == ids[3]) {//Si verdadero, se agrega la clase active-menu
                                $("#"+ids[i]+"").addClass("active-menu");
                            }else{//De lo contrrio, le quita la clase active-menu
                                $("#"+ids[i]+"").removeClass("active-menu")
                            }
                        }
                    }, 1000);//Se espera 1 segundo para mostrar la alerta para redireccionarlo al login
                }else if(r==2){//Si el resultado de la ruta destino es distinto a 1, entonces es porque hubo un problema al registrarse
                    alertify.error('El usuario ya existe');//Se alerta al usuario que no se pudo registrar
                }else{
                    alertify.error('No se pudo realizar el deposito');//Se alerta al usuario que no se pudo depositar el monto
                }
            }
        });
    }else{
        alertify.error('Datos incorrectos');//Se alerta al usuario que no se pudo hacer la operación
    }
};

function submitretirar(){
    var retirar1 = document.getElementById("retirar1").value.trim();//Guarda la informacion del monto ingresado por el usuario
    //Validacion que se encarga de evaluar las variables declaradas anteriormente
    //Valida si no estan vacias y si corresponden al tipo de dato solicitado
    //La variable "validar" se encuentra en el script de validacion.js
    //En la variable validar es como un arreglo que guarda los metodos que van a 
    //servir para validar las variables
    if(retirar1 != '' && validar.monto(retirar1) && retirar1 >= 1000){
        //cedula = btoa(cuenta);
        cadena1 = "retirar=" + retirar1;
        $.ajax({
            type:"POST",//Metodo de envio
            url:"controller/val_retirar.php",//Ruta destino a la cual se le va a enciar la variable
            data:cadena1,//La informacion que se va a enviar a la ruta destino
            success:function(r){//Esta funcion recibe el valor retornado de la ruta destino
                if(r==1){//Se valida si el valor retornado es igual a 1, pues esto es el resultado de la consulta sql, si se ejecuto sin ningun problema
                    alertify.success('Registrado con exito'); //Se le alerta al usuario que el usuario ha sido registrado con exito  
                    setTimeout(function(){ 
                        $("#view").load("pages/consultar.php");//Cargar en la etiqueta con id view la vista solicitada
                        //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
                        //id de las opciones del menu lateral, este for lo que hara sera cambiar
                        //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
                        //presione alguna opcion, esta se quede seleccionada con el color rojo
                        for (var i = 0; i < ids.length; i++) {
                            if (ids[i] == ids[3]) {//Si verdadero, se agrega la clase active-menu
                                $("#"+ids[i]+"").addClass("active-menu");
                            }else{//De lo contrrio, le quita la clase active-menu
                                $("#"+ids[i]+"").removeClass("active-menu")
                            }
                        }
                    }, 1000);//Se espera 1 segundo para mostrar la alerta para redireccionarlo al login
                }else if(r==2){//Si el resultado de la ruta destino es distinto a 1, entonces es porque hubo un problema al registrarse
                    alertify.error('El usuario ya existe');//Se alerta al usuario que no se pudo registrar
                }else{
                    alertify.error('No se pudo realizar el retiro');//Se alerta al usuario que no se pudo depositar el monto
                }
            }
        });
    }else{
        alertify.error('Datos incorrectos');//Se alerta al usuario que no se pudo hacer la operación
    }
};

//Funcion que se ejecutal al dar click en el boton depositar de la presentacion
function btntransferir(){
    $("#view").load("pages/transferir.php");//Cargar en la etiqueta con id view la vista solicitada
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
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
};

//Funcion que se ejecutal al dar click en el boton depositar de la presentacion
function btndepositar(){
    $("#view").load("pages/depositar.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[1]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
};

//Funcion que se ejecutal al dar click en el boton retirar de la presentacion
function btnretirar(){
    $("#view").load("pages/retirar.php");//Cargar en la etiqueta con id view la vista solicitada
    //EL siguiete for va a recorrer el arreglo que contiene el nombre de los
    //id de las opciones del meu lateral, este for lo que hara sera cambiar
    //las clases de cada elemento seleccionado, esto sirve para que cuando el usuario
    //precione alguna opcion, esta se quede seleccionada con el color rojo
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] == ids[2]) {//Si verdadero, se agrega la clase active-menu
            $("#"+ids[i]+"").addClass("active-menu");
        }else{//De lo contrrio, le quita la clase active-menu
            $("#"+ids[i]+"").removeClass("active-menu")
        }
    }
    //La case active-menu sirve para dar color rojo a la opcion seleccionada del menu
};

/*====================================
    DATA TABLES
======================================*/
//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion




//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion
function transacciont(){
    $("#transferencias").load("pages/tablas/tablatransferencias.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $("#transferencias1").load("pages/tablas/tablatransferencia1.php");//Cargar en la etiqueta con id view la vista solicitada
        setTimeout(function() {
            $('#transacciont1').DataTable( {
                "ajax": "pages/tablas/informacionTablas1.php",
                "columns": [
                    { "data": "name" },
                    { "data": "position" },
                    { "data": "salary" },
                    { "data": "start_date" }
                ]
            } );
        },50);
    },100);
}

//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion
function transacciond(){
    $("#transferencias").load("pages/tablas/tablaDepositos.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $('#depositos').DataTable( {
            "ajax": "pages/tablas/informacionTablas3.php",
            "columns": [
                { "data": "salary" },
                { "data": "start_date" }
            ]
        } );
    },50);
}

//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion
function transaccionr(){
    $("#transferencias").load("pages/tablas/tablaRetiros.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $('#retiros').DataTable( {
            "ajax": "pages/tablas/informacionTablas4.php",
            "columns": [
                { "data": "salary" },
                { "data": "start_date" }
            ]
        } );
    },50);
}

//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion
function transacciont1(){
    $("#transferencias1").load("pages/tablas/tablatransferencia1.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $('#transacciont1').DataTable( {
            "ajax": "pages/tablas/informacionTablas1.php",
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "salary" },
                { "data": "start_date" }
            ]
        } );
    },50);
}

//Funcion que se ejecuta al dar click en el boton transacciont1 de la presentacion
function transacciont2(){
    $("#transferencias1").load("pages/tablas/tablatransferencia2.php");//Cargar en la etiqueta con id view la vista solicitada
    setTimeout(function() {
        $('#transacciont1').DataTable( {
            "ajax": "pages/tablas/informacionTablas2.php",
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "salary" },
                { "data": "start_date" }
            ]
        } );
    },50);
}
