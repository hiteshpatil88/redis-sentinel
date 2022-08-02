<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


/**
 * Description of sentinel.php

 * Creation date : 03-Aug-2022 12:21:16 AM 
 * @author Hitesh Patil 
 */
error_reporting(0);


try {
    $time_start_execution = time();

    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

    $host = "127.0.0.1"; 
    $port = "26379"; //sentinel port
    $auth = "testauth";

    $sentinel = new \Jenner\RedisSentinel\Sentinel();
    $sentinel->connect($host, $port);
    $sentinel->auth($auth);
    $master = $sentinel->getMasterDetails();
    $address = $sentinel->getMasterAddrByName($master[0]['name']);
} catch (Exception $ex) {
    echo "Something went wrong =>" . $ex->getMessage();
}
?>
