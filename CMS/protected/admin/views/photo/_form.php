<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo CHtml::activeFileField($model,'filename'); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo $form->labelEx($model,'caption'); ?>
		<?php echo $form->textArea($model,'caption',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'caption'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
	<label>Show Image in Homepage Banner?
		<?php echo $form->checkBox($model,'show_banner'); ?>
		<?php echo $form->error($model,'show_banner'); ?>
	</label>
	<label>Show Image in Gallery?
		<?php echo $form->checkBox($model,'show_gallery'); ?>
		<?php echo $form->error($model,'show_gallery'); ?>
	</label>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->