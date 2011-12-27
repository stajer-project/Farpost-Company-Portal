<?php
$this->breadcrumbs=array(
	'Библиотека'=>array('/section'),
    'Электронные книги'=>array('/ebook'),
);

 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ebook-form',
	'enableAjaxValidation'=>false,
));

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
    array('label'=>'Читалки', 'url'=>array('/programs')),
);
?>

<?php
    if(isset($_GET['id']) && $_GET['id']!="")
        $current_section = $_GET['id'];
    else
        $current_section = "книги";
?>

<h3  align="right">
    <?php echo CHtml::link(CHtml::encode('Бумажные '.$current_section), 'index.php?r=book/oneSection&id='.$_GET['id']); ?>
</h3>

<h1>Электронные книги</h1>
<h2><?php echo $_GET['id'] ?></h2>

<?php $this->endWidget(); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

