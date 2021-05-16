<?php

try {

    $usuario = filter_input(INPUT_POST, "usuario");
    $senha = filter_input(INPUT_POST, "senha");

    require_once '../AD/ConectaAD.php';
    $ConectaAD = new ConectaAD();
    
    $ConectaAD->autenticaUsuarioAD($usuario, $senha);
    
    //trazer infos do usuario
    $dados = $ConectaAD->get_info_usuario($usuario);
    
    session_start();
    $_SESSION["nome"] = $dados['nome'];
    $_SESSION["usuario"] = $dados['usuario'];

    $array = array("retorno" => true);
    echo json_encode($array);
} catch (Exception $ex) {
    $array = array("retorno" => false, "mensagem" => $ex->getMessage());
    echo json_encode($array);
}

