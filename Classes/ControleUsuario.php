<?php

namespace Classes;

/**
 * Description of ControleUsuario
 *
 * @author danilo.silva
 */
class ControleUsuario {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        mysqli_select_db($this->conn, "adm");
    }

    function buscarTodos($tabela) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM $tabela");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    function buscarPorId($tabela, $id) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM $tabela WHERE id_usuario=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    function alterar($tabela, $id, $login, $senha, $tipo_acesso) {
        $stmt = mysqli_prepare($this->conn, "UPDATE $tabela SET login_usuario=?, senha_usuario=?, id_tipo_acesso=? WHERE id_usuario=?");
        $stmt->bind_param("ssii", $login, $senha, $tipo_acesso, $id);
        return $stmt->execute();
    }

    function inserir($tabela, $login, $senha, $tipo_acesso) {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO $tabela (login_usuario, senha_usuario, id_tipo_acesso) VALUES(?,?,?)") or die('error');
        $stmt->bind_param("ssi", $login, $senha, $tipo_acesso)  or die('error');
        return $stmt->execute();
    }

    function remover($tabela, $id) {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM $tabela WHERE id_usuario=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    function carregarLogs() {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM logs");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}
