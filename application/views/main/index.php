<h1>Головна сторінка</h1>
<?php foreach ($news as $val) : ?>
    <h2><?= $val['title'] ?></h2>
    <p><?= $val['description'] ?></p>
    <hr>
<?php endforeach; ?>