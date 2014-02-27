<?php
/**
 * @var app\models\NameGeneratorForm $formModel
 */

use app\widgets\PrettyRadios;
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
					'labelOptions' => ['class' => 'control-label'],
				],
			]); ?>
			<?= PrettyRadios::widget([
				'options' => $formModel->getRaces(),
				'form' => $form,
				'formModel' => $formModel,
				'formAttribute' => 'race',
				'color' => 'green',
			]) ?>
			<?= PrettyRadios::widget([
				'options' => $formModel->getNameTypes(),
				'form' => $form,
				'formModel' => $formModel,
				'formAttribute' => 'nameType',
				'color' => 'blue',
			]) ?>
			<?= $form->field($formModel, 'numberOfNames') ?>
			<?php ActiveForm::end() ?>
		</div>
	</div>
</div>