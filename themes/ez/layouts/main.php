<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */

use app\assets\StylesAsset;

StylesAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Space Rangers name generator</title>
	<?php $this->head() ?>
	</head>
<body>
<?php $this->beginBody() ?>

	<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>