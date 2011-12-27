<?php
$this->breadcrumbs=array(
	'Бумажные книги'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<h1>Добавление бумажной книги</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>