<?php
if (isset($_GET['postId'])) {
    $postId = $_GET['postId'];
} else {
    $postId = null;
}

$post = [
    'id' => 1,
    'title' => 'The Road Ahead',
    'subtitle' => 'Путешествие начинается',
    'author' => 'Me',
    'content' => 'Это полный текст поста...'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
    <title>Пост <?= htmlspecialchars($postId) ?> - Мой блог</title>
</head>

<body>
    <div class="header">
        <img src="images/menuHome.png" alt="home">
        <img src="images/menuProfile.png" alt="profile">
        <img src="images/menuPlus.png" alt="plus">
    </div>
    
    <div class="post-container">
        <h1>
            Пост #<?= htmlspecialchars($postId) ?>: <?= htmlspecialchars($post['title']) ?>
        </h1>
        
        <h2>ID поста: <?= htmlspecialchars($postId) ?></h2>
        
        <h3><?= htmlspecialchars($post['subtitle']) ?></h3>
        <span>Автор: <?= htmlspecialchars($post['author']) ?></span>
        
        <div class="post-content">
            <?= $post['content'] ?>
        </div>
    </div>
</body>

</html>