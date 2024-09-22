<?php
function load_private_notes() {
    require_once 'db1.php';
    $sql = 'SELECT * FROM notes WHERE private = "private" AND author = ?';
    $stmt = $pdo1->prepare($sql);
    $stmt->execute([$_SESSION['username']]); // Execute the query
    $content = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($content as $post) {
        echo '<div class="pn_note">';
        echo '<p class="created-at">' . substr($post['created_at'], 0, 16) . '</p>';
        echo '<p class="content">' . $post['content'] . '</p>';
        echo '</div>';
    }
}
