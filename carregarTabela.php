<?php

include_once './autoload.php';
include '../conn.php';

use Classes\ControleUsuario;

$funcoes = new ControleUsuario($conn);

$tabela = $_GET['tabela'];

$resultado = $funcoes->buscarTodos($tabela);

while ($obj = $resultado->fetch_assoc()) :
    $oper = "<button id='" . $obj["id_usuario"] . "' title='Editar' type ='submit' class='btn btn-primary btn-xs update'><i class='fa fa-pencil'></i></button>&nbsp;<button id='" . $obj["id_usuario"] . "' title='Excluir' type ='submit' class='btn btn-primary btn-xs excluir'><i class='fa fa-times'></i></button>";
    $obj["operacoes"] = $oper;
    $rows["data"][] = $obj;
endwhile;

echo json_encode($rows);
