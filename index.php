<?php
session_start();
include 'function.php';

$con = condb();
$error = "";
$mensaje = "";

if (!$con) {
    die();
}

if (isset($_POST['button'])) {
    switch ($_POST['button']) {
        case 'login':

            if (!empty($_POST['email']) || !empty($_POST['psw'])) {
                $email = $_POST['email'];
                $psw = $_POST['psw'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Ingresa un email valido!";
                } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);    
                }
            
                $statement = $con->prepare("SELECT * FROM users WHERE email = :email AND password = :pass");
                $statement->execute(array(
                    ':email' => $email,
                    ':pass' => $psw
                ));

                $resultado = $statement->fetchAll();

                if ($resultado != false) {
                    $_SESSION['usuario'] = $email;
                    header('Location: session.php');
                } else {
                    $error .= "Credenciales invalidas";
                }
            } else {
                $error .= "Error!"; 
            }

            break;
            
        case 'registro': 
            
            if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['psw'])) {
                $error .= "Rellena los campos correctamente!";
            } else {

                if (is_string($_POST['fname'])) {
                    $fname = cleardatos($_POST['fname']);
                }
                
                if (is_string($_POST['lname'])) {
                    $lname = cleardatos($_POST['lname']);
                }
                
                $email = cleardatos($_POST['email']);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error .= "El email ingresado no es valido!";
                } else {
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                }
               
                $psw = cleardatos($_POST['psw']);
            
                
                $statement = $con->prepare("SELECT * FROM users WHERE email = :email");
                $statement->execute(array(
                    ':email' => $email,
                ));

                $resultado = $statement->fetchAll();

                if ($resultado == true) {
                    $error .= "El correo que intentas utilizar ya existe!";
                } 

                if ($error == '') {
                    $statement = $con->prepare("INSERT INTO users (id, user, lname, password, email) VALUES (null, :user, :lname, :password, :email)");

                    $statement->execute(array(
                        ':user' => $fname,
                        ':lname' => $lname,
                        ':password' => $psw,
                        ':email' => $email, 
                    ));

                    $mensaje .= "Usuario creado con exito!";
                    header('Location: index.php');
                }
            }

            break;
           
    }
}


include 'index.view.php';