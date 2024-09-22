<?php

function display_errs(){
    if(isset($_SESSION['login_errors'])){
        $errors = $_SESSION['login_errors'];
        foreach($errors as $error){
            echo "<p>" . '&#10060  ' . $error . "</p>";
            echo "<br>";
        }
        unset($_SESSION['login_errors']);
        
    }
}