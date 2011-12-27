<?php
$this->breadcrumbs=array(
    'Библиотека'=>array('index'),
	'Разделы',
);

$this->menu=array(
	array('label'=>'Создать раздел', 'url'=>array('create')),
	array('label'=>'Управление разделами', 'url'=>array('admin')),
    array('label'=>'Читалки', 'url'=>array('/programs')),
);
?>
<?php $empty_space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>

<h3><?php echo CHtml::link(CHtml::encode('Все электронные книги'), array('/ebook', 'Все книги'));
echo $empty_space.$empty_space.$empty_space.$empty_space;
 echo CHtml::link(CHtml::encode(' Все бумажные книги'), array('/book', 'Все книги')); ?></h3>

<h1>Разделы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
