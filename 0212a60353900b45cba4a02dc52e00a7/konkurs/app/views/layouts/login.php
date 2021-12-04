<!doctype html>
<html lang="ru">
<head>
    <?php
    $manifestPath = WWW.'/mix-manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="<?= $manifest['/css/app.css'] ?>">
</head>
<body>
<?php if (isset($_SESSION['error'])): ?>
<div class="container">
    <div class="alert alert-danger">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
</div>
<?php endif; ?>

<div class="form-signin container wrapper">
    <div class="wrapper-border border-gradient border-gradient-w"></div>
    <div class="container-xl position-relative">
        <?=/** @var $content */ $content ?>
    </div>
</div>

<script src="<?= $manifest['/js/app.js'] ?>"></script>
<?php
foreach($scripts as $script){
    echo $script;
}
?>
</body>
</html>