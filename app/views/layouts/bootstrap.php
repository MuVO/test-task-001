<?php \yii\bootstrap\BootstrapPluginAsset::register($this) ?>
<html>
<?php $this->beginPage() ?>
<head>
    <?php $this->head() ?>
    <title><?= $this->title ?></title>
</head>
<body class="container-fluid">
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>
</html>
