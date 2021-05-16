<?php

session_start();

session_destroy();

header("Location: " . "http://" . $_SERVER['SERVER_NAME'] . "/" . explode("/", $_SERVER["REQUEST_URI"])[1]);