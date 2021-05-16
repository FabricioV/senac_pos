<?php
require_once './validar-sessao.php';
require_once '../Base.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TCC</title>
    <script src="<?= Base::url() ?>assets/js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?= Base::url() ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?= Base::url() ?>assets/js/script.js?<?= $time ?>" type="text/javascript"></script>
    <link href="<?= Base::url() ?>admin/sidebars.css?<?= $time ?>" rel="stylesheet">
    <link href="<?= Base::url() ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<div class="d-flex flex-column p-3 text-white bg-dark" style="width: 220px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Pós</span>
    </a>
    <br>
    <p class="info-logado">Olá, <?= $_SESSION['nome'] ?></p>

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= Base::url() ?>admin/inicio/" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                Início
            </a>
        </li>
        <li>
            <a href="<?= Base::url() ?>admin/registros/" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                Registros
            </a>
        </li>


        <li>
            <a href="<?= Base::url() ?>admin/logout/" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                Sair
            </a>
        </li>

    </ul>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>