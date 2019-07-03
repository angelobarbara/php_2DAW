<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 17:16
 */
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','','proyecto_php');
        $db->query("SET NAMES 'utf-8'");
        return $db;
    }
}