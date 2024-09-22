<?php
declare(strict_types=1);


function chech_signup_errors(){
    if(isset($_SESSION['error_signup'])){
        $errors = $_SESSION['error_signup'];
        
        foreach($errors as $error){
            echo "<p>" . '&#10060  ' . $error . "</p>";
            echo "<br>";
        }
        unset($_SESSION['error_signup']);

    ;}
}

function is_signed(){
    if(isset($_SESSION['signed_up'])){
        $status = $_SESSION['signed_up'];
            echo "<b>" . '&#10003; ' . $status.  "</b>";
            echo '<br>';
    unset($_SESSION['signed_up']);

    ;}
;}