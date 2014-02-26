<?php

namespace app\assets;

use yii\web\AssetBundle;

class StylesAsset extends AssetBundle
{
	public $sourcePath = '@webroot/css';
	public $css = [
		'fonts.css',
		'main.css',
	];
	public $depends = [
		'yii\bootstrap\BootstrapAsset',
	];
}