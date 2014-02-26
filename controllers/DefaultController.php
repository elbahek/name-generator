<?php

namespace app\controllers;

use app\models\NameGeneratorForm;
use yii\web\Controller;

class DefaultController extends Controller
{

	public function actionIndex()
	{
		$formModel = new NameGeneratorForm();

		return $this->render('main', ['formModel' => $formModel]);
	}
}