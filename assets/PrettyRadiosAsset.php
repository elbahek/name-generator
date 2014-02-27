<?php

namespace app\assets;

use yii\web\AssetBundle;

class PrettyRadiosAsset extends AssetBundle
{
	public $sourcePath = '@webroot/js';
	public $js = [
		'pretty_radios.js',
	];
	public $depends = [
		'yii\bootstrap\BootstrapPluginAsset',
	];
}