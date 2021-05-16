<?php

class ConexaoBD {

    private $usuairio = "ti";
    private $senha = "T1sup0rt&";

    public function __construct() {
        $this->conecta_bd();
    }

    public function conecta_bd() {
        try {
            $this->conn = new PDO('mysql:host=192.168.74.178;port=3306;dbname=pos', $this->usuairio, $this->senha);
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
