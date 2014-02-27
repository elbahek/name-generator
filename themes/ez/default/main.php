<?php
/**
 * @var yii\web\View $this
 * @var app\models\NameGeneratorForm $formModel
 */

use app\assets\GenerateNamesAjaxAsset;
use app\widgets\PrettyRadios;
use yii\bootstrap\Button;
use yii\widgets\ActiveForm;

GenerateNamesAjaxAsset::register($this);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<h1><?= 'Generate some names'/*Yii::t('main', 'Generate some names')*/ ?>...</h1>
		</div>
		<div class="col-lg-3 col-lg-offset-3">
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
					'defaultOption' => $formModel->race,
				]) ?>
			<?= PrettyRadios::widget([
					'options' => $formModel->getNameTypes(),
					'form' => $form,
					'formModel' => $formModel,
					'formAttribute' => 'nameType',
					'color' => 'blue',
					'defaultOption' => $formModel->nameType,
				]) ?>
			<?= $form->field($formModel, 'numberOfNames', ['options' => ['class' => 'col-lg-12 form-group']]) ?>
			<div class="form-group col-lg-12">
				<?= Button::widget([
					'label' => 'Generate'/*Yii::t('main', 'Generate')*/,
					'options' => [
						'type' => 'button',
						'id' => 'generate-names-submit',
						'class' => 'btn-default btn-red pull-right',
					]
				]) ?>
			</div>
			<?php ActiveForm::end() ?>
		</div>
		<div class="col-lg-3">
			<div id="generation-results">
				<ul></ul>
			</div>
		</div>
	</div>
</div>