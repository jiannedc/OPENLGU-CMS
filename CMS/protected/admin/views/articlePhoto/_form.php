<?php
/* @var $this ArticlePhotoController */
/* @var $model ArticlePhoto */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-photo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
echo $form->errorSummary($model);

$article_opts = CHtml::listData(Article::model()->findAll(),'article_id','article_header');
$photo_opts = CHtml::listData(Photo::model()->findAll(),'photo_id','title');
echo "<label>Select Article: </label>";
echo $form->dropDownList($model,'article_id',$article_opts,array('empty'=>''));

echo "<label>Select Photo:</label>";
echo $form->dropDownList($model,'photo_id',$photo_opts,array('empty'=>'')); 
?>

	<div class="row">
	<div class="small-6 medium-5 large-3 columns">
		<?php echo $form->labelEx($model,'display_order'); ?>
		<?php echo $form->textField($model,'display_order'); ?>
		<?php echo $form->error($model,'display_order'); ?>
	</div>
	</div>

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->