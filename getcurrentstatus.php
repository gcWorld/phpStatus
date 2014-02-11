<?php

$maint = file_get_contents('./maint.txt', true);

//Does not work on Google App Engine!
function check_port($server,$port) {
    $conn = @fsockopen($server, $port, $errno, $errstr, 2);
    if ($conn) {
        fclose($conn);
        return "<span class='text-success'><i class='fa fa-check-circle'></i> aktiv</span>";
    } else {
        return "<span class='text-danger'><i class='fa fa-times-circle'></i> inaktiv</span>";       
    }
}

function check_db($server) {
    $content = file_get_contents($server);
    if (strpos($content,'Access denied') !== false) {
        return "<span class='text-success'><i class='fa fa-check-circle'></i> aktiv</span>";
    } else {
        return "<span class='text-danger'><i class='fa fa-times-circle'></i> inaktiv</span>";  
    }
}

function check_web($server) {
    $content = file_get_contents($server);
    if (strpos($content,'pong') !== false) {
        return "<span class='text-success'><i class='fa fa-check-circle'></i> aktiv</span>";
    } else {
        return "<span class='text-danger'><i class='fa fa-times-circle'></i> inaktiv</span>";  
    }   
}

if(isset($_GET['pw'])){
    if($_GET['pw']=="password"){
        if(isset($_GET['status'])) {
            file_put_contents('status.txt',$_GET['status']);
        } elseif(isset($_GET['maint'])) {
            file_put_contents('maint.txt',$_GET['maint']);
        }
    }
}