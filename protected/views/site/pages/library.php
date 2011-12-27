<?php
$this->pageTitle=Yii::app()->name . ' - Library';
$this->breadcrumbs=array(
	'Library',
);
?>
<h1>Библиотека</h1>

    <?php echo CHtml::link(CHtml::encode('Электронные книги'), array('/section', 'Электронные книги')); ?><br/><br/>
    <?php echo CHtml::link(CHtml::encode('Бумажные книги'), array('/section', 'Бумажные книги')); ?>

