$('#login').click(function(){

  // Traemos los datos de los inputs
  var user  = $('#user').val();
  var clave = $('#clave').val();

  // Envio de datos mediante Ajax
  $.ajax({
    method: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: 'controller/loginController.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: {user_php: user, clave_php: clave},
    // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
    beforeSend: function(){
      // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
      $('#load').show();
    },
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function(res){
      // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
      $('#load').hide();

      // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
      if(res == 'error_1'){
        swal('Warning', 'All fields are required', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Incorrect username or password', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'Too many failed login attempts. Please try again later', 'error');
      }else{
        // Redireccionamos a la página que diga corresponda el usuario
        window.location.href= res
      }

    }
  });

});


$('#registro').click(function(){

  var form = $('#formulario_registro').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/registroController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Warning', 'All fields are required', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Passwords must match', 'error');
      }else if(res == 'error_3'){
        swal('Warning', 'Email already in use', 'warning');
      }else if(res == 'error_4'){
        swal('Error', 'Invalid email address', 'error');
      }else if(res == 'error_5'){
        swal('Warning', 'Username already taken', 'warning');
      }
      else{
        window.location.href = res ;
      }


    }
  });

});

function mostrarClave() {
  document.getElementById("clave").type = "text";
}

function ocultarClave() {
  document.getElementById("clave").type = "password";
}
