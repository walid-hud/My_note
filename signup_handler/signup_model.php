<?php


function get_username(object $pdo , string $username){
    $query = 'SELECT username FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([":username" => $username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result
;}

function get_email(object $pdo , string $email){
    $query = 'SELECT email FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([":email" => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result
;}
function set_user($pdo , $username , $email , $pwd){
    $query = 'INSERT INTO users (username , email , password) VALUES (:username , :email , :pwd);';
    $stmt = $pdo->prepare($query);
    $stmt->execute([":username" => $username , ":email" => $email , ":pwd" => $pwd]);

}