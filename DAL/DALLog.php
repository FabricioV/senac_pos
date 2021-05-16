<?php

//require_once '../BD/ConexaoBD.php';

class DALLog {

    public static function cadastrar(string $descricao, string $data, string $ip) {

        try {

            $conn = mysqli_connect("192.168.74.178", "ti", "T1sup0rt&", "pos");
            if (!$conn) {
                die("faleceu" . mysqli_connect_error());
            }

            $sql = "INSERT INTO log (descricao, data, ip) VALUES ('$descricao', '$data', '$ip')";
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        } catch (Exception $ex) {

            throw new Exception($ex);
        }
    }

    public static function listar($input_search) {
        try {
            $conn = mysqli_connect("192.168.74.178", "ti", "T1sup0rt&", "pos");
            if (!$conn) {
                die("erro" . mysqli_connect_error());
            }
            $dados = [];
            $where = '';
                        
            if(!empty($input_search)){
                $where = " WHERE descricao LIKE '%$input_search%' ";
            }
            $sql = "SELECT id, descricao FROM log $where ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $dados[$i]['descricao'] = $row["descricao"];
                    $dados[$i]['id'] = $row["id"];
                    $i++;
                }
            }else{
                throw new Exception($conn->error);
            }
            return $dados;
        } catch (Exception $ex) {
            throw new Exception($ex);
        }
    }

}
