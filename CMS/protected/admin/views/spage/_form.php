<?php
/* @var $this SpageController */
/* @var $model Spage */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spage-form',	
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
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>20, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	</div>

	<div class="row">	
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->