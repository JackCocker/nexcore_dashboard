$('#login').click(function(){

  // Traemos los datos de los inputs
  var user  = $('#user').val();
  var clave = $('#clave').val();

  $.ajax({
    method: 'POST',
    url: 'controller/loginController.php',
    data: {user_php: user, clave_php: clave},
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Warning', 'All fields are required', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Incorrect username or password', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'Too many failed login attempts. Please try again later', 'error');
      }else{
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

function mostrarClave(icono) {
  // Busca el input anterior al icono
  const input = icono.parentElement.querySelector('input');
  if (input) input.type = 'text';
}

function ocultarClave(icono) {
  const input = icono.parentElement.querySelector('input');
  if (input) input.type = 'password';
}
