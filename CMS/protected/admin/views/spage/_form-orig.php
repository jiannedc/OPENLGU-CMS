<?php
/* @var $this SpageController */
/* @var $model Spage */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spage-form',
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
		<?php $this->widget('application.extensions.tinymce.ETinyMce', array('name'=>'content')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	</div>

	<div class="row">	
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
		<label>Publish Page?
		<?php echo $form->checkBox($model,'is_published'); ?>
		<?php echo $form->error($model,'is_published'); ?>
		</label>
	</div>
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'layout'); ?>
			<select name="Spage[layout]" id ="Spage_layout">
				<option value="column1">One Column</option>
				<option value="column2">Two Column</option>
			</select>
		<?php echo $form->error($model,'layout'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->