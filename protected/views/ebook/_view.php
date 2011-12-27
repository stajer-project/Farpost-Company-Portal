<div class="view">

	<?php echo $this->material_image($data->name, $data->photo,'small_img right');?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section')); ?>:</b>
	<?php echo CHtml::encode($data->section); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annotation')); ?>:</b>
	<?php echo CHtml::encode($data->annotation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mark')); ?>:</b>
	<?php echo CHtml::encode($data->mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('format')); ?>:</b>
	<?php echo CHtml::encode($data->format); ?>
	<br />
    <?php echo CHtml::submitButton('Сохранить', array('submit'=>'index.php?r=/ebook/uploadfile&id='.$data->name.'&f='.$data->format)); ?>

</div>

