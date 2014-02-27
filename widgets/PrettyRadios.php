<?php

namespace app\widgets;

use yii\base\Widget;

class PrettyRadios extends Widget
{

	public $options;
	public $form;
	public $formModel;
	public $formAttribute;
	public $defaultOption;
	public $color = 'blue';

	/**
	 * Executes the widget.
	 * @return string the result of widget execution to be outputted.
	 */
	public function run()
	{
		if (!in_array($this->color, ['green', 'blue']))
			$this->color = 'blue';

		if (!empty($this->options))
		{
			return $this->render('//widgets/pretty_radios', [
				'options' => $this->options,
				'form' => $this->form,
				'formModel' => $this->formModel,
				'formAttribute' => $this->formAttribute,
				'color' => $this->color,
				'defaultOption' => $this->defaultOption,
			]);
		}
	}
}