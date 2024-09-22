<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $_POST['username'];    
$password = $_POST['password'];

    try {
        require_once '..\db_session\dbh.php';
        require_once '.\login_model.php';
        require_once '.\login_control.php';
        // errors
        $errors = [];
        if(is_input_empty($username , $password)){
            $errors['empty_input'] = 'please fill in all fields ! ';
        }
        if(is_account_real($pdo , $username , $password)){
            $errors['404'] = 'account not found';
        }
        require_once '..\db_session\session_config.php';
        if($errors){
            $_SESSION['login_errors'] = $errors;
            header('location: ..\login.php');
            die();
        }
        $user = get_acount($pdo , $username , $password);
        if($user){
            $_SESSION['user_id'] = $user['id'];        
            $_SESSION['username'] = $user['username'];
            session_regenerate_id(true);
            header('location: ..\home.php');
            die();
        }

    }catch (PDOException $e) {
        die('query failed ' . $e->getMessage());
    } 
    


}else{
    header('location: ..\login.php');
    die();
}

