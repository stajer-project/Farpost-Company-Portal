<?php
$this->breadcrumbs=array(
	'Ebooks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ebook', 'url'=>array('index')),
	array('label'=>'Create Ebook', 'url'=>array('create')),
	array('label'=>'Update Ebook', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete Ebook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ebook', 'url'=>array('admin')),
);
?>

<h1>View Ebook #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'author',
		'name',
		'section',
		'language',
		'annotation',
		'mark',
		'photo',
		'format',
	),
)); ?>

