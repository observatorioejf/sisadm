<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_POST))
    header("Location: index.php");

$_SESSION['tabela'] = $_POST['tabela'];

include_once '../conn.php';
include_once './autoload.php';

use Classes\ControleUsuario;

$requisicao = $_POST['tipo_de_requisicao'];
$controleUsuario = new ControleUsuario($conn);

if ($requisicao == "alterar") {
    $resultado = alterar($controleUsuario);
} elseif ($requisicao == "inserir") {
    $resultado = inserir($controleUsuario);
} elseif ($requisicao == "remover") {
    $resultado = remover($controleUsuario);
} elseif ($requisicao == "buscarPorId") {
    buscarPorId($controleUsuario);
}


function alterar($controleUsuario) {
    echo $controleUsuario->alterar($_POST['tabela'], $_POST['id'], $_POST['login'], $_POST['senha'], $_POST['tipo_acesso']);
}

function inserir($controleUsuario) {
    echo $controleUsuario->inserir($_POST['tabela'], $_POST['login'], $_POST['senha'], $_POST['tipo_acesso']);
}

function remover($controleUsuario) {
    echo $controleUsuario->remover($_POST['tabela'], $_POST['id']);
}

function buscarPorId($controleUsuario) {
    $result = $controleUsuario->buscarPorId($_POST['tabela'], $_POST['id']);
    print_r(json_encode($result->fetch_assoc()));
}
