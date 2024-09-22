<?php
require_once 'db_session\dbh.php';

$sql = 'SELECT * from notes where public = public ';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $post) {
    echo $post['author'] . "\n";
    echo $post['content'] . "\n";
}