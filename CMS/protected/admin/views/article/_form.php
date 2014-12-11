<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>
<script type = "text/javascript">
function enableTextbox() {
if (document.getElementById("Article_article_type").value == "publication") {
	$('#body_description').text("Description");
	$('#file_location_cont').removeClass('hide');
}
else {
	$('#file_location_cont').addClass('hide');
}
}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
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
		<?php echo $form->labelEx($model,'article_header'); ?>
		<?php echo $form->textField($model,'article_header',array('size'=>50)); ?>
		<?php echo $form->error($model,'article_header'); ?>
	</div>
	</div>
	
	<div id="file_location_cont" class="row	  <?php if($model->article_type!='publication'){ echo "hide";} ?> ">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo $form->labelEx($model,'file_location'); ?>
		<?php echo CHtml::activeFileField($model,'file_location'); ?>
		<?php echo $form->error($model,'file_location'); ?>
	</div>	
	</div>
	
	<div id="body_cont" class="row">
	<div class="small-12 medium-12 large-12 columns">
		<label id="body_description"><?php if($model->article_type!="publication"){ echo "Article Body"; } else { echo "Description"; } ?></label>
		<?php echo $form->textArea($model,'article_body',array('rows'=>10, 'cols'=>50, 'height'=>100)); ?>
		<?php echo $form->error($model,'article_body'); ?>
	</div>
	</div>
	
	<div class="row">	
	<div class="small-12 medium-6 large-6 columns">
	<label>Publish Article?
		<?php echo $form->checkBox($model,'is_published'); ?>
		<?php echo $form->error($model,'is_published'); ?>
		</label> 
		<label>Add to featured article?
		<?php echo $form->checkBox($model,'is_featured'); ?>
		<?php echo $form->error($model,'is_featured'); ?>
		</label> 
	</div>
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'article_type'); ?>
			<select name="Article[article_type]" id ="Article_article_type"  onchange="enableTextbox()">
				<option <?php if($model->article_type=='announcement'){ echo "selected"; } ?> value="announcement">Announcement</option>
				<option <?php if($model->article_type=='news'){ echo "selected"; } ?> value="news">News</option>
				<option <?php if($model->article_type=='publication'){ echo "selected"; } ?> value="publication">Publication</option>
			</select>
		<?php echo $form->error($model,'article_type'); ?>
	</div>
	</div>
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
