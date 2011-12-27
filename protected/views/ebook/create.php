<?php
$this->breadcrumbs=array(
	'Электронные книги'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List Ebook', 'url'=>array('index')),
	array('label'=>'Manage Ebook', 'url'=>array('admin')),
);
?>

<h1>Создать электронную книгу</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>