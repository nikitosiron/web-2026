<?php
$postId = isset($_GET['postId']) ? (int)$_GET['postId'] : null;

// Массив с данными постов
$posts = [
    1 => [
        'id' => 1,
        'author' => 'Ваня Денисов',
        'author_avatar' => 'images/avatar.jpg',
        'content' => '<p>Как красиво сегодня на улице! Настоящая зима)) 
                  Вспоминается Бродский: «Поздно ночью, в уснувшей долине, 
                  на самом дне, в городе</p>',
        'image' => 'images/post1.jpg',
        'date' => strtotime('2024-03-15 14:30:00'),
        'likes' => 203,
    ],
    2 => [
        'id' => 2,
        'author' => 'Лиза Демина',
        'author_avatar' => 'images/avatar2.jpg',
        'content' => '<p>Как красиво сегодня на улице! Настоящая зима)) 
                  Вспоминается Бродский: «Поздно ночью, в уснувшей долине, 
                  на самом дне, в городе</p>',
        'image' => 'images/post2.jpg',
        'date' => strtotime('2024-03-10 10:15:00'),
        'likes' => 1000,
    ]
];

if (!$postId || !isset($posts[$postId])) {
    header('HTTP/1.0 404 Not Found');
    die('<h1>Ошибка 404 - Пост не найден</h1>
         <p><a href="index.php">Вернуться на главную</a></p>');
}

$post = $posts[$postId];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['author']) ?> - Пост</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <a href="index.php">
            <img src="images/menuHome.png" alt="home">
        </a>
        <img src="images/menuProfile.png" alt="profile">
        <img src="images/menuPlus.png" alt="plus">
    </div>

    <div class="post-container">
        <div class="post-meta">
            <div class="author-info">
                <div class="post-author">
                    <img src="<?= htmlspecialchars($post['author_avatar']) ?>" alt="avatar">
                </div>
                <span class="author-name"><?= htmlspecialchars($post['author']) ?></span>
            </div>
            <div class="post-details">
                <span class="date"><?= htmlspecialchars(date('d.m.Y', $post['date'])) ?></span>
            </div>
        </div>

        <?php if (!empty($post['image'])): ?>
            <div class="post-image">
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="post image">
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