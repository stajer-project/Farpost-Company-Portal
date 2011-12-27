<?php

/**
 * This is the model class for table "ebook".
 *
 * The followings are the available columns in table 'ebook':
 * @property string $author
 * @property string $name
 * @property string $section
 * @property string $language
 * @property string $annotation
 * @property string $mark
 * @property string $photo
 * @property string $format
 *
 * The followings are the available model relations:
 * @property Section $section0
 */
class Ebook extends CActiveRecord
{
	public $ebook_file;
    public $icon; // атрибут для хранения загружаемой картинки
    /**
	 * Returns the static model of the specified AR class.
	 * @return Ebook the static model class
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
		return 'ebook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, name, section, language, annotation, mark, photo, format', 'required'),
			array('author, name, section, photo', 'length', 'max'=>100),
			array('language', 'length', 'max'=>5),
			array('mark', 'length', 'max'=>1),
			array('format', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('author, name, section, language, annotation, mark, photo, format', 'safe', 'on'=>'search'),
            array('ebook_file', 'file', 'allowEmpty'=>true, 'types'=>'txt, doc, pdf, djvu'),
            array('icon', 'file',
			'types'=>'jpg, gif, png',
			'maxSize'=>1024 * 1024 * 6, // 6 MB
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
			'annotation' => 'Аннотация',
			'mark' => 'Оценка',
			'photo' => 'Изображение',
			'format' => 'Формат',
            'icon' => 'Изображение',
            'ebook_file' => 'Загрузить файл',
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
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('mark',$this->mark,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('format',$this->format,true);

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