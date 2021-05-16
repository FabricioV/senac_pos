<?php

class ConexaoBD {

    private $usuairio = "usuario";
    private $senha = "senha";

    public function __construct() {
        $this->conecta_bd();
    }

    public function conecta_bd() {
        try {
            $this->conn = new PDO('mysql:host=localhost;port=3306;dbname=pos', $this->usuairio, $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
            
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function desconect_bd() {
        $this->conn = null;
    }

}
