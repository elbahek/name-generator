<?php
/**
 * @var app\models\NameGeneratorForm $formModel
 */

use app\widgets\PrettyRadios;
use yii\bootstrap\Button;
use yii\widgets\ActiveForm;
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
						'class' => 'btn-default btn-red pull-right',
					]
				]) ?>
			</div>
			<?php ActiveForm::end() ?>
		</div>
		<div class="col-lg-3">
			<div id="generation-results">
				<ul>
					<li>Name 1</li>
					<li>Name 2</li>
					<li>Name 3</li>
					<li>Name 4</li>
					<li>Name 5</li>
					<li>Name 6</li>
					<li>Name 7</li>
					<li>Name 8</li>
					<li>Name 9</li>
					<li>Name 10</li>
				</ul>
			</div>
		</div>
	</div>
</div>