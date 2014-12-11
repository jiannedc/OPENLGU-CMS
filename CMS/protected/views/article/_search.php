<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'article_id'); ?>
		<?php echo $form->textField($model,'article_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_header'); ?>
		<?php echo $form->textField($model,'article_header',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_body'); ?>
		<?php echo $form->textArea($model,'article_body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_type'); ?>
		<?php echo $form->textField($model,'article_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auto_delete'); ?>
		<?php echo $form->checkBox($model,'auto_delete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auto_delete_date'); ?>
		<?php echo $form->textField($model,'auto_delete_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_published'); ?>
		<?php echo $form->checkBox($model,'is_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_featured'); ?>
		<?php echo $form->checkBox($model,'is_featured'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->