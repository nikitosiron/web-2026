<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
    <title>home</title>
</head>

<body>
    <?php
    $posts = [
        1 => [
            'id' => 1,
            'title' => 'The Road Ahead',
            'subtitle' => 'subtitle',
            'author' => 'Me',
        ],
        2 => [
            'id' => 2,
            'title' => 'The Road Ahead',
            'subtitle' => 'subtitle',
            'author' => 'Me',
        ],
    ];
    ?>
    <div class="header">
        <img src="images/menuHome.png" alt="home">
        <img src="images/menuProfile.png" alt="profile">
        <img src="images/menuPlus.png" alt="plus">
    </div>
    <div class="timeline">
        <?php foreach ($posts as $post): ?>
            <div class="post-preview">
                <a href="component/post.php?postId=<?= $post['id'] ?>">
                    <h3><?= htmlspecialchars($post['title']) ?></h3>
                    <p><?= htmlspecialchars($post['subtitle']) ?></p>
                    <span><?= htmlspecialchars($post['author']) ?></span>
                </a>
            </div>
        <?php endforeach; ?>
        <div>
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <h4><?= htmlspecialchars($post['subtitle']) ?></h4>
            <span><?= htmlspecialchars($post['author']) ?></span>
        </div>
    </div>
</body>

</html>