<?php
/**
 * @var yii\web\view $this
 * @var array $options
 * @var yii\widgets\ActiveForm $form
 * @var yii\base\Model $formModel
 * @var string $formAttribute
 * @var string $color
 * @var integer $defaultOption
 */

use app\assets\PrettyRadiosAsset;
use yii\bootstrap\ButtonGroup;

PrettyRadiosAsset::register($this);

$buttons = [];
foreach ($options as $value => $label)
{
	$buttons[] = [
		'label' => $label,
		'options' => [
			'type' => 'button',
			'class' => $value === $defaultOption ? 'active' : '',
			'data-checkbox-value' => $value
		],
	];
}

$buttonGroup = ButtonGroup::widget([
	'buttons' => $buttons,
	'encodeLabels' => true,
	'options' => ['class' => 'pretty-radios btn-group-'.$color],
]);
$field = $form->field($formModel, $formAttribute, ['options' => ['class' => 'form-group pretty-radios-wrapper col-lg-12']]);
$field->template = "{label}\n{input}\n". $buttonGroup ."{hint}\n{error}";
echo $field->radioList($options);
?>
