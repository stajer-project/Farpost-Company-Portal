<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section'); ?>
		<?php $section = Yii::app()->db->createCommand("select name from section")->queryAll();
            $list = CHtml::listData($section, 'name', 'name');
            echo CHtml::activeDropDownList($model, 'section', $list); ?>
		<?php echo $form->error($model,'section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo CHtml::activeDropDownList($model, 'language', array('ru'=>'ru', 'en'=>'en')); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark'); ?>
		<div class="compactRadioGroup">
		    <?php echo CHtml::activeRadioButtonList($model, 'mark',
                                                    array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'),
                                                    array('separator' => " ")); ?>
        </div>
		<?php echo $form->error($model,'mark'); ?>
	</div>

	 <div class="row">
		<?php echo $form->labelEx($model,'icon1'); ?>
		<?php //Поле загрузки картинки
		echo CHtml::activeFileField($model, 'icon1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annotation'); ?>
		<?php echo $form->textArea($model,'annotation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'annotation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model, 'language', array('В библиотеке'=>'В библиотеке', 'На руках'=>'На руках')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->