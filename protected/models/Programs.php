<?php

/**
 * This is the model class for table "programs".
 *
 * The followings are the available columns in table 'programs':
 * @property string $name
 * @property string $size
 * @property string $discription
 */
class Programs extends CActiveRecord
{
	public $program;
    /**
	 * Returns the static model of the specified AR class.
	 * @return Programs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, size, discription', 'required'),
			array('name', 'length', 'max'=>100),
			array('size', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, size, discription', 'safe', 'on'=>'search'),
            array('program', 'file', 'allowEmpty'=>true, 'types'=>'exe, iso'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Название',
			'size' => 'Размер',
			'discription' => 'Описание',
            'program' => 'Загрузить файл',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('name',$this->name,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('discription',$this->discription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}