<?php
/**
 * @var array $options
 * @var yii\widgets\ActiveForm $form
 * @var yii\base\Model $formModel
 * @var string $formAttribute
 * @var string $color
 */

use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;

$buttons = [];
foreach ($options as $value => $label)
{
	$buttons[] = [
		'label' => $label,
		'options' => ['type' => 'button']
	];
}

$buttonGroup = ButtonGroup::widget([
	'buttons' => $buttons,
	'encodeLabels' => true,
	'options' => ['class' => 'btn-group-'.$color],
]);
$field = $form->field($formModel, $formAttribute);
$field->template = "{label}\n{input}\n". $buttonGroup ."{hint}\n{error}";
echo $field->radioList($options);
?>
