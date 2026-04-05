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
        [
            'title' => 'The Road Ahead',
            'subtitle' => '',
            'img_modifier' => '',
            'author' => '',
            // другие свойства этого поста
        ],
        [
            // свойства второго поста
        ],
    ];
    ?>
    <div class="header">
        <img src="images/menuHome.png" alt="home">
        <img src="images/menuProfile.png" alt="profile">
        <img src="images/menuPlus.png" alt="plus">
    </div>
    <div class="timeline">
        <?php
        foreach ($posts as $post) {
            include 'component/post_preview.php';
        }
        ?>
    </div>
</body>

</html>