<?php
session_start(); 

if(isset($_POST['email']) && !empty($_POST['email']) &&
   isset($_POST['senha']) && !empty($_POST['senha'])){

    require __DIR__ . '/index2.php'; 
    require __DIR__ . '/Usuario.class.php';


    $u = new Usuario();

    $email = $_POST['email'];
    $senha = md5($_POST['senha']); 

    if($u->login($email, $senha)){
      
        $_SESSION['usuario_logado'] = $email;

     header("Location: index.html"); 
      exit;

    } else {
        echo "Email ou senha incorretos!";
        exit;
    }

} else {
    header("Location: login.html");
    exit;
}

?>