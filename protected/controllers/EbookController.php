<?php

class EbookController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'uploadFile', 'OneSection'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ebook;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Ebook']))
		{
			$model->attributes=$_POST['Ebook'];

            //Полю icon присвоить значения поля формы icon
			$model->icon=CUploadedFile::getInstance($model,'icon');
			if ($model->icon){
                ///!!!так можно узнать расширение!!!
				//$sourcePath = pathinfo($model->icon->getName());
				///$fileName = date('m-d').'-'.'.'.$sourcePath['extension'];
                $pictureFileName = $model->icon->getName();
                $model->icon->saveAs('images\\'.$pictureFileName);
				$model->photo = $pictureFileName;
			}

            $uploadedFile=CUploadedFile::getInstance($model,'ebook_file');
           // $bookFileName = $uploadedFile->getName();
            $sourcePath = pathinfo($uploadedFile->getName());
            $model->format = $sourcePath['extension'];
            $bookFileName = $model->name.'.'.$model->format;
			if($model->save()){
                $uploadedFile->saveAs('ebooks\\'.$bookFileName);
				$this->redirect(array('view','id'=>$model->name));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ebook']))
		{
			$model->attributes=$_POST['Ebook'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->name));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Ebook');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ebook('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ebook']))
			$model->attributes=$_GET['Ebook'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ebook::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ebook-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionOneSection()
	{
        $this->breadcrumbs=array(
	'Библиотека'=>array('/section'),
    'Электронные книги',
            'Детективы'
);

        $model=new Ebook('currentSection');
		$dataProvider=$model->currentSection();
        if(isset($_POST['book_kind'])){
            $book_kind = $_POST['book_kind'];
            $this->redirect(Yii::app()->homeURL.'?r='.$book_kind.'/oneSection&id='.$_GET['id']);
        }
        else
            $book_kind = 'ebook';

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
            'book_kind' => $book_kind,
		));
    }

     //загрузка файла с сервера
    public function actionUploadFile($id, $f){
        header('Content-Type: application/'.$f);
        $file = $id.'.'.$f;
        header('Content-Disposition: attachment; filename='.$file.';');
        //header('Content-Length: '.filesize('ebooks\q.txt'));
        readfile('ebooks/'.$file);
        Yii::app()->end();
    }

    public function material_image($title, $image, $class='material_img')
	{
		$width='140';
        $height='160';
        if(isset($image) && file_exists('images/'.$image))
			return CHtml::image('images/'.$image, $title,
			array(
			    'height'=>$height,
                'width'=>$width,
		        'class'=>$class,
			));
		else
			return CHtml::image(Yii::app()->getBaseUrl(true).'/images/pics/noimage.gif','Нет картинки',
			array(
			    'height'=>$height,
                'width'=>$width,
			    'class'=>$class
			));
	}
}
