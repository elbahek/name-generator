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

	public function actionGenerate()
	{
		$formModel = new NameGeneratorForm();
		$formModel->race = (int) $_POST['NameGeneratorForm']['race'];
		$formModel->nameType = (int) $_POST['NameGeneratorForm']['nameType'];
		$formModel->numberOfNames = (int) $_POST['NameGeneratorForm']['numberOfNames'];
		echo json_encode($formModel->generateNames());
	}
}