<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Globals
 *
 * @author fvasconcellos
 */
class Base {
            
    public static function url() {
         return "http://" . $_SERVER['SERVER_NAME'] . "/" . explode("/", $_SERVER["REQUEST_URI"])[1] . "/";
    }
}
