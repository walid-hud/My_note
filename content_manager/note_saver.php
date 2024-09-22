<?php
require_once'..\db_session\session_config.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $author = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $note = htmlentities($_POST['note']);
    $private = $_POST['private'];
    $public = $_POST['public'];
    


    require_once 'db.php';

    if($public || $private){
        $sql = 'INSERT INTO notes (user_id , content , public , private , author) VALUES (? , ? , ? , ? , ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id , $note , $public , $private , $author]);
        $_SESSION['saved'] = true;

        header("location: ../home.php");

        exit();

    }

    if($public || $private == false){
        $sql = 'INSERT INTO notes (user_id , content , public , private) VALUES (? , ? , ? , ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id , $note , $public , $private]);
        $_SESSION['saved'] = true;
        header("location: ../home.php");
        exit();
    }

    if($public == false || $private){
        $sql = 'INSERT INTO notes (user_id , content , public , private) VALUES (? , ? , ? , ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id , $note , $public , $private]);
        $_SESSION['saved'] = true;
        header("location: ../home.php");
        exit();

    }



}else{
    echo "<script> alert('something went wrong !') ;</script>'";
    header("location: ../home.php");
    die();
    
}