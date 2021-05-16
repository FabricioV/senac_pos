<?php

try {
    echo shell_exec("(echo '123' ; echo '123') | passwd vrau");
} catch (Exception $ex) {
    print_r($ex);
}