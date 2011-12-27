<?php
$this->breadcrumbs=array(
	'Программы',
);

$this->menu=array(
	array('label'=>'Добавить читалку', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Программы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
