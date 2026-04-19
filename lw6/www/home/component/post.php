<?php
require_once '../config/database.php';

$connection = connectDatabase();

$postId = isset($_GET['postId']) ? (int)$_GET['postId'] : null;

if (!$postId) {
    header('HTTP/1.0 404 Not Found');
    die('<h1>Ошибка 404 - Пост не найден</h1>');
}

$query = "SELECT 
            post.*, 
            user.name AS author,
            user.avatar AS author_avatar
          FROM post 
          JOIN user ON post.user_id = user.id 
          WHERE post.id = :id";

$statement = $connection->prepare($query);
$statement->execute([':id' => $postId]);
$post = $statement->fetch();

if (!$post) {
    header('HTTP/1.0 404 Not Found');
    die('<h1>Ошибка 404 - Пост не найден</h1>');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['author']) ?> - Пост</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <a href="../index.php">
            <img src="../images/menuHome.png" alt="home">
        </a>
        <img src="../images/menuProfile.png" alt="profile">
        <img src="../images/menuPlus.png" alt="plus">
    </div>

    <div class="post-container">
        <div class="post-meta">
            <div class="author-info">
                <div class="post-author">
                    <img src="../<?= htmlspecialchars($post['author_avatar']) ?>">
                </div>
                <span class="author-name"><?= htmlspecialchars($post['author']) ?></span>
            </div>
            <div class="post-details">
                <span class="date"><?= htmlspecialchars(date('d.m.Y', strtotime($post['posted_at']))) ?></span>
            </div>
        </div>

        <?php if (!empty($post['image'])): ?>
            <div class="post-image">
                <img src="../<?= htmlspecialchars($post['image']) ?>" alt="post_image">
            </div>
        <?php endif; ?>

        <div class="post-content">
            <?= $post['content'] ?>
        </div>

        <div class="post-actions">
            <button class="like-btn">❤️ Нравится <?= $post['likes'] ?></button>
        </div>
    </div>
</body>

</html>