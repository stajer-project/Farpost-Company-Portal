<?php
$this->breadcrumbs=array(
	'Программы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список программ', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавление новой программы</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>