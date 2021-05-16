<?php

try {
    
    $input_search = $_POST['input_search'];
    
    require_once '../DAL/DALLog.php';

    $dados = DALLog::listar($input_search);

    $r = array("retorno" => true, "dados" => $dados);
    echo json_encode($r);
} catch (Exception $ex) {
    $r = array("retorno" => false, "mensagem" => $ex->getMessage());
    echo json_encode($r);
}

