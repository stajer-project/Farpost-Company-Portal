<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>Create Section</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>