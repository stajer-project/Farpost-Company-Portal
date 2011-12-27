<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $author
 * @property string $name
 * @property string $section
 * @property string $language
 * @property string $mark
 * @property string $photo
 * @property string $annotation
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Section $section0
 */
class Book extends CActiveRecord
{
	public $book_kind;
    public $icon1; // атрибут для хранения загружаемой картинки
    /**
	 * Returns the static model of the specified AR class.
	 * @return Book the static model class
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
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, name, section, language, mark, photo, annotation, status', 'required'),
			array('author, name, section, photo', 'length', 'max'=>100),
			array('language', 'length', 'max'=>2),
			array('mark, status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('author, name, section, language, mark, photo, annotation, status', 'safe', 'on'=>'search'),
            array('icon1', 'file',
			'types'=>'jpg, gif, png',
			'maxSize'=>1024 * 1024 * 5, // 5 MB
			'allowEmpty'=>true,
			'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
			),
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
			'section0' => array(self::BELONGS_TO, 'Section', 'section'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'author' => 'Автор',
			'name' => 'Название',
			'section' => 'Раздел',
			'language' => 'Язык',
			'mark' => 'Оценка',
			'annotation' => 'Аннотация',
			'status' => 'Статус',
            'icon1' => 'Изображение',
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

		$criteria->compare('author',$this->author,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('mark',$this->mark,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

     public function currentSection()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('section',$_GET['id'],true);
        //$criteria->compare('section','Романы',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }
}