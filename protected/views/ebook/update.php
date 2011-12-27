<?php
$this->breadcrumbs=array(
	'Ebooks'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ebook', 'url'=>array('index')),
	array('label'=>'Create Ebook', 'url'=>array('create')),
	array('label'=>'View Ebook', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Ebook', 'url'=>array('admin')),
);
?>

<h1>Update Ebook <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>