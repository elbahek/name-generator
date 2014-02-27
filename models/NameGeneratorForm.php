<?php

namespace app\models;

use yii\base\Model;
use Yii;

class NameGeneratorForm extends Model
{
	const RACE_HUMAN = 0;
	const RACE_PELENG = 1;
	const RACE_MALOC = 2;
	const RACE_FEI = 3;
	const RACE_GAAL = 4;
	const RACE_DOMINATOR = 5;

	const NAME_TYPE_ANY = 0;
	const NAME_TYPE_PIRATE = 1;
	const NAME_TYPE_RANGER = 2;
	const NAME_TYPE_TRANSPORT = 3;
	const NAME_TYPE_WARRIOR = 4;

	public $race;
	public $nameType;
	public $numberOfNames = 10;

	/**
	 * Initializes the object
	 */
	public function init()
	{
		$this->race = static::RACE_HUMAN;
		$this->nameType = static::NAME_TYPE_ANY;
	}

	/**
	 * @see yii\base\Model::rules()
	 * @return array List of validation rules
	 */
	public function rules()
	{
		return [
			[['race', 'nameType', 'numberOfNames'], 'required'],
			[['race'], 'number', 'integerOnly' => true, 'min' => static::RACE_HUMAN, 'max' => static::RACE_DOMINATOR],
			[['nameType'], 'number', 'integerOnly' => true, 'min' => static::NAME_TYPE_ANY, 'max' => static::NAME_TYPE_WARRIOR],
			[['numberOfNames'], 'number', 'integerOnly' => true, 'min' => 1, 'max' => 10],
		];
	}

	/**
	 * @see yii\base\Model::attributeLabels()
	 * @return array List of attribute labels
	 */
	public function attributeLabels()
	{
		return [
			'race' => Yii::t('main', 'Race'),
			'nameType' => Yii::t('main', 'Name type'),
			'numberOfNames' => Yii::t('main', 'Number of names'),
		];
	}

	/**
	 * @return array List of available races
	 */
	public function getRaces()
	{
		return [
			static::RACE_HUMAN => Yii::t('main', 'Human'),
			static::RACE_PELENG => Yii::t('main', 'Peleng'),
			static::RACE_MALOC => Yii::t('main', 'Maloc'),
			static::RACE_FEI => Yii::t('main', 'Fei'),
			static::RACE_GAAL => Yii::t('main', 'Gaal'),
			static::RACE_DOMINATOR => Yii::t('main', 'Dominator'),
		];
	}

	/**
	 * @return array List of available name types
	 */
	public function getNameTypes()
	{
		return [
			static::NAME_TYPE_ANY => Yii::t('main', 'Any'),
			static::NAME_TYPE_PIRATE => Yii::t('main', 'Pirate'),
			static::NAME_TYPE_RANGER => Yii::t('main', 'Ranger'),
			static::NAME_TYPE_TRANSPORT => Yii::t('main', 'Transport'),
			static::NAME_TYPE_WARRIOR => Yii::t('main', 'Warrior'),
		];
	}

	/**
	 * @return array|null List of randomly selected names or null
	 */
	public function generateNames()
	{
		if (!$this->validate())
			return null;

		$data = json_decode(file_get_contents(Yii::getAlias(Yii::$app->params['pathToNamesFile'])), true);
		$resultingNamesList = [];
		$race = $this->getNamesJsonKey('race', $this->race);
		$nameType = $this->getNamesJsonKey('nameType', $this->nameType);

		if ($race === null || $nameType === null)
			return null;

		if ($this->race === static::RACE_DOMINATOR)
			$resultingNamesList = $data[$race]['all'];
		elseif ($this->nameType === static::NAME_TYPE_ANY)
			foreach ($data[$race] as $names)
				$resultingNamesList = array_merge($resultingNamesList, $names);
		else
			$resultingNamesList = $data[$race][$nameType];

		$keys = array_rand($resultingNamesList, $this->numberOfNames);

		return array_intersect_key($resultingNamesList, array_combine($keys, $keys));
	}

	protected function getNamesJsonKey($keyType, $keyNumber)
	{
		$nameTypes = [
			static::NAME_TYPE_ANY => 'any',
			static::NAME_TYPE_PIRATE => 'pirates',
			static::NAME_TYPE_RANGER => 'rangers',
			static::NAME_TYPE_TRANSPORT => 'transports',
			static::NAME_TYPE_WARRIOR => 'warriors',
		];
		$races = [
			static::RACE_HUMAN => 'human',
			static::RACE_PELENG => 'peleng',
			static::RACE_MALOC => 'maloc',
			static::RACE_FEI => 'fei',
			static::RACE_GAAL => 'gaal',
			static::RACE_DOMINATOR => 'dominator',
		];
		if ($keyType === 'race')
			return $races[$keyNumber];
		if ($keyType === 'nameType')
			return $nameTypes[$keyNumber];

		return null;
	}
}