<?php
/**
 * @var app\models\NameGeneratorForm $formModel
 */

use yii\bootstrap\ButtonGroup;
use yii\widgets\ActiveForm;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<h1><?= 'Generate some names'/*Yii::t('main', 'Generate some names')*/ ?>...</h1>
			<?php $form = ActiveForm::begin([
				'id' => 'generate-names-form',
				'options' => ['class' => 'form-horizontal'],
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
				],
			]); ?>
			<?= $form->field($formModel, 'race')->radioList($formModel->getRaces()); ?>
			<?= '' ?>
			<?= $form->field($formModel, 'nameType')->radioList($formModel->getNameTypes()); ?>
			<?= $form->field($formModel, 'numberOfNames') ?>
			<?php ActiveForm::end() ?>
		</div>
	</div>
</div>