<?php
$this->breadcrumbs=array(
	'Библиотека'=>array('/section'),
    'Бумажные книги'=>array('/book'),
);

$this->menu=array(
	array('label'=>'Создать книгу', 'url'=>array('create')),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<?php
    if(isset($_GET['id']) && $_GET['id']!="")
        $current_section = $_GET['id'];
    else
        $current_section = "книги";
?>

<h3  align="right">
    <?php echo CHtml::link(CHtml::encode('Электронные '.$current_section), 'index.php?r=ebook/oneSection&id='.$_GET['id']); ?>
</h3>

<h1>Бумажные книги</h1>
<h2><?php echo $_GET['id'] ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


