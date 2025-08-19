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
        swal('Warning','All fields are required', 'warning');
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
        swal('Warning','All fields are required', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Passwords must match', 'error');
      }else if(res == 'error_3'){
        swal('Warning','Email already in use', 'warning');
      }else if(res == 'error_4'){
        swal('Error', 'Invalid email address', 'error');
      }else if(res == 'error_5'){
        swal('Warning','Username already taken', 'warning');
      }
      else{
        window.location.href = res ;
      }
    }
  });
});


$('#recuperar').click(function(){
  var email = $('#email').val();

  $.ajax({
    method: 'POST',
    url: 'controller/recuperarController.php',
    data: {email_php: email},
    beforeSend: function(){ $('#load').show(); },
    success: function(res){
      $('#load').hide();
      if(res == 'error_1'){
        swal('Warning','Email required','warning');
      }else if(res == 'error_mail'){
        swal('Error','This email is not registered','error');
      }else if(res == 'success_mail'){
        swal('Success','Check your email for the code','success');
        setTimeout(function(){ window.location.href='views/verificar_view.php'; }, 2000);
      }
    }
  });
});


$('#verificar').click(function(){
  var email = $('#email').val();
  var code  = $('#code').val();

  $.ajax({
    method: 'POST',
    url: 'controller/verificarController.php',
    data: {email_php: email, code_php: code},
    success: function(res){
      if(res == 'error_1'){
        swal('Warning','All fields required','warning');
      }else if(res == 'error_code'){
        swal('Error','Invalid or expired code','error');
      }else if(res == 'success_code'){
        swal('Success','Code verified','success');
        setTimeout(function(){ window.location.href='views/restablecer_view.php'; }, 2000);
      }
    }
  });
});


$('#restablecer').click(function(){
  var password = $('#password').val();

  $.ajax({
    method: 'POST',
    url: 'controller/restablecerController.php',
    data: {password_php: password},
    success: function(res){
      if(res == 'error_1'){
        swal('Warning','Password required','warning');
      }else if(res == 'error_session'){
        swal('Error','Session expired, restart process','error');
      }else if(res == 'error_reset'){
        swal('Error','Password update failed','error');
      }else if(res == 'success_reset'){
        swal('Success','Password successfully updated','success');
        setTimeout(function(){ window.location.href='index.php'; }, 2000);
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
