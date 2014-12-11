<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo $form->labelEx($model,'file_location'); ?>
		<?php echo CHtml::activeFileField($model,'file_location'); ?>
		<?php echo $form->error($model,'file_location'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'download_access'); ?>
		<?php echo $form->radioButton($model,'download_access',array('value'=>'All', 'uncheckValue'=>null)); ?> <strong>Everyone</strong><br />
		<?php echo $form->radioButton($model,'download_access',array('value'=>'Residents', 'uncheckValue'=>null)); ?> <strong>Only Residents</strong><br />
		<?php echo $form->radioButton($model,'download_access',array('value'=>'Business', 'uncheckValue'=>null)); ?> <strong>Only Business Owners</strong><br />
		<?php echo $form->radioButton($model,'download_access',array('value'=>'Registered', 'uncheckValue'=>null)); ?> <strong>Only Registered Users</strong><br />
		<?php echo $form->radioButton($model,'download_access',array('value'=>'None', 'uncheckValue'=>null)); ?> <strong>Not Downloadable</strong>
		<?php if($form->error($model,'download_access')!= "") echo "<div class=errorMessage>Please select from the choices above.</div>"; ?>
	</div>
	</div>	
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'button expand')); ?>
	</div>
	</div>	
<?php $this->endWidget(); ?>

</div><!-- form -->