<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Programs', 'url'=>array('index')),
	array('label'=>'Create Programs', 'url'=>array('create')),
	array('label'=>'Update Programs', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete Programs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Programs', 'url'=>array('admin')),
);
?>

<h1>View Programs #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'size',
		'discription',
	),
)); ?>
