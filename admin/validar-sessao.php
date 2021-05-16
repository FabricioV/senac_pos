<?php
//PHP_SESSION_ACTIVE = se as sessoes estiverem habilitadas e uma existir
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['nome']) || !isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: " . "http://" . $_SERVER['SERVER_NAME'] . "/" . explode("/", $_SERVER["REQUEST_URI"])[1]);
}