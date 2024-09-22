<?php
require_once '..\db_session\dbh.php';

function get_user($pdo ,$username ,$password){
    $sql = 'SELECT * FROM users WHERE username LIKE ? AND password LIKE ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username , $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
