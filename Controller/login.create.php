<?php

include_once "../model/usuario.php";

$correo = $_GET["correo"];
$pass = $_GET["password"];

$usuarioM = new \modelo\Usuario;
$usuarioM->setCorreo($correo);
$usuarioM->setPassword($pass);
$response = $usuarioM->login();




if(isset($response) AND !empty($response)){
    session_start();
$_SESSION["correo"] = $response[0]["correo"];
$_SESSION["password"] = $response[0]["password"];
}

echo json_encode($response);
unset($response);
unset($usuarioM);