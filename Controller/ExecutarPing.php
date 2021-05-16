<?php

try {
    $input_ping = filter_input(INPUT_POST, "input_ping");

    $cmd = "<pre>" . shell_exec("ping -c 4 $input_ping") . "</pre>";
    $r = array("retorno" => true, "dados" => $cmd);

    //grava log
    $data = date('Y-m-d H:i:s', time());
    $ip = get_ip_cliente();

    require_once '../DAL/DALLog.php';
    DALLog::cadastrar($input_ping, $data, $ip);

    echo json_encode($r);
} catch (Exception $ex) {
    $r = array("retorno" => false, "mensagem" => $ex->getMessage());
    echo json_encode($r);
}

function get_ip_cliente() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}
