<div class="timeline-post">
    <div class="post-profile">
        <img src="images/avatar.png" alt="profile-avatar">
        <p class="profile-username">Ваня Денисов</p>
        <img src="images/pen.png" alt="change" class="profile-change">
    </div>
    <img src="images/photo1.png" alt="photo1" class="post-foto">
    <div class="post-react">
        <p class="react-count"><img src="images/likes.png" alt="like">203</p>
    </div>
    <div class="post-text">
        <p class="text-author">Как красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно
            ночью, в уснувшей долине, на самом дне, в городе</p>
        <p class="text-func">ещё</p>
        <p class="text-func">2 часа назад</p>
    </div>
</div>
</div>
<div>
    <h3><?= $post['title'] ?></h3>
    <h4><?= $post['subtitle'] ?></h4>
    <span><?= $post['author'] ?></span>
    <a title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>'>
        <?= $post['subtitle'] ?>
    </a>
</div>