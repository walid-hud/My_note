<?php
function load_public_notes() {
    require_once 'db.php';
    $sql = 'SELECT * FROM notes WHERE public = "public"';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(); // Execute the query
    $content = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($content as $post) {
        echo '<div class="pb_note">';
        echo '<h2 class="username">' . $post['author'] . '</h2>';
        echo '<p class="created-at">' . substr($post['created_at'], 0, 16) . '</p>';
        echo '<p class="content">' . $post['content'] . '</p>';
        echo '</div>';
    }
}
