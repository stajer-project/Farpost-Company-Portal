<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Programs', 'url'=>array('index')),
	array('label'=>'Create Programs', 'url'=>array('create')),
	array('label'=>'View Programs', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Programs', 'url'=>array('admin')),
);
?>

<h1>Update Programs <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>