<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $email = $_POST['email'];

    try {
        require_once "..\db_session\dbh.php";
        require_once "signup_model.php";
        require_once "signup_control.php";   
        
    //Error handelers
    $errors = [];
    if(is_input_empy($username , $email , $pwd)){
        $errors['empty_input'] = "fill in all fields !";
    ;}

    if(is_email_invalid($email)){
        $errors['invalid_email'] = "invalid email !";
        

    ;}

    if(is_username_taken($pdo , $username)){
        $errors['username_taken'] = "username already in use !";

    ;}

    if(is_email_registered($pdo , $email)){
        $errors['email_registered'] = "email already in use ! ";
    }

    require_once "..\db_session\session_config.php";   
    if($errors){
        $_SESSION['error_signup'] =  $errors;
        $signup_data = [
            'username' => $username,
            'email' => $email
        ];
        $_SESSION['data'] = $signup_data;
        header("location: " . "..\index.php");
        die();
        
    }

    create_user($pdo , $username ,$email , $pwd);
    $_SESSION['signed_up'] = "registered successfully ! you can login now .";

    $pdo = null;
    $stmt = null;

    }catch (PDOException $e) {
        die('query failed ' . $e->getMessage());
    }
    



}else{
    header("Locaiton : ../index.php");
    die();
}
