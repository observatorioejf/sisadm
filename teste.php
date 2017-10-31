<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../conn.php';
include_once './autoload.php';

use Classes\ControleUsuario;

$controleUsuario = new ControleUsuario($conn);


$controleUsuario->inserir("samcjf_usuario", "teste", "123", 2);
//echo $result;
//$row[] = $result->fetch_assoc();
//print_r(json_encode($row));
