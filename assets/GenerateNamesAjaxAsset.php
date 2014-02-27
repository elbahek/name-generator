<?php

namespace app\assets;

use yii\web\AssetBundle;

class GenerateNamesAjaxAsset extends AssetBundle
{
	public $sourcePath = '@webroot/js';
	public $js = [
		'generate_names.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];
}