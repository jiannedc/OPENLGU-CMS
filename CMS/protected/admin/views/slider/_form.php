<?php
/* @var $this SliderController */
/* @var $model Slider */
/* @var $form CActiveForm */

?>
<script type = "text/javascript">
function updatePhotoId(id) {
	$('#Slider_photo_id').val(id);
}
function HasImage() {
$('#has_image_field').val(true);
$('#header2').prop('disabled', true);
$('#caption2').prop('disabled', true);
$('#header').prop('disabled', false);
$('#caption').prop('disabled', false);
}
function TextOnly() {
//$('#Slider_has_image_0').prop('checked', true);
$('#has_image_field').val(false);
$('#header2').prop('disabled', false);
$('#caption2').prop('disabled', false);
$('#header').prop('disabled', true);
$('#caption').prop('disabled', true);
}
</script>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">	
	<div class="small-12 medium-6 large-6 columns">
	<div class="row">
		<?php echo $form->labelEx($model,'slider_name'); ?>
			<select name="Slider[slider_name]" id ="Slider_slider_name"  onchange="enableTextbox()">
				<option <?php if($model->slider_name=='news'){ echo "selected"; } ?> value="headline">Headline</option>
				<option <?php if($model->slider_name=='publication'){ echo "selected"; } ?> value="events">Events</option>
			</select>
		<?php echo $form->error($model,'slider_name'); ?>
	</div>
	</div>
	</div>
	
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		
		<input type="hidden" id="has_image_field" name="Slider[has_image]" value="<?php if($model->has_image=='1') echo 'true'; else echo 'false';?>" />
		<?php //echo $form->radioButtonList($model,'has_image', array('1'=>'Text Only', '2'=>'Has Image'), array('onclick'=>'showAddPhoto()')); ?>
		<?php echo $form->error($model,'has_image'); ?>
	</div>
	</div>
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
	<dl class="accordion" data-accordion="contentAccordionGroup">
	  <dd class="accordion-navigation" >
		<a href="#panel1" onclick="HasImage()">With Image</a>
		<div id="panel1" class="content <?php if(isset($model->has_image) && $model->has_image=='1') echo 'active';?>">
		<div class="row">
		<div class="row">
		<div class="small-12 medium-10 large-10 medium-offset-1 large-offset-1 columns">
			<?php echo $form->labelEx($model,'header'); ?>
			<?php echo $form->textField($model,'header',array('size'=>50, 'id'=>'header')); ?>
			<?php echo $form->error($model,'header'); ?>
		</div>	
		</div>
		<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<?php echo $form->labelEx($model,'caption'); ?>
			<?php echo $form->textArea($model,'caption',array('rows'=>3, 'cols'=>80, 'id'=>'caption')); ?>
			<?php echo $form->error($model,'caption'); ?>
		</div>	
		</div>
		<div class="row collapse prefix-radius">
		<div class="small-3 columns">
			<span class="prefix">Photo Id</span>
		</div>
		<div class="small-9 columns">
			<?php echo $form->textField($model,'photo_id'); ?>
		</div>
		</div>
		<div id="thumb_view">
			<ul class="medium-block-grid-4 large-block-grid-6">
		  <?php foreach($data as $item){ ?>
			<li><a class="th" onclick="updatePhotoId(<?php echo $item->photo_id;?>)">
				<img src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($item->filename); ?>">
			</a></li>
			 
		 <?php } ?>
			</ul>
		</div>
		</div>
	  </dd>
	  <dd class="accordion-navigation" >
		<a href="#panel2" onclick="TextOnly()">Text Only</a>
		<div id="panel2" class="content <?phpif(isset($model->has_image) && $model->has_image!='1') echo 'active';?>">
		<div class="row">
		<div class="small-12 medium-10 large-10 medium-offset-1 large-offset-1 columns">
			<?php echo $form->labelEx($model,'header'); ?>
			<?php echo $form->textField($model,'header',array('size'=>50, 'id'=>'header2')); ?>
			<?php echo $form->error($model,'header'); ?>
		</div>	
		</div>
		<div class="row">
		<div class="small-12 medium-8 large-8 medium-offset-2 large-offset-2 columns">
			<?php echo $form->labelEx($model,'caption'); ?>
			<?php echo $form->textArea($model,'caption',array('rows'=>8, 'cols'=>50, 'id'=>'caption2')); ?>
			<?php echo $form->error($model,'caption'); ?>
		</div>	
		</div>
		<div class="row">
		<div class="small-12 medium-10 large-10 medium-offset-1 large-offset-1 columns">
			<?php echo $form->labelEx($model,'event_date'); ?>
			<?php echo $form->textField($model,'event_date',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'event_date'); ?>
		</div>
		</div>

		<div class="row">
		<div class="small-12 medium-10 large-10 medium-offset-1 large-offset-1 columns">
			<?php echo $form->labelEx($model,'venue'); ?>
			<?php echo $form->textArea($model,'venue',array('rows'=>3, 'cols'=>50)); ?>
			<?php echo $form->error($model,'venue'); ?>
		</div> 
		</div> 
		</div>
	  </dd>
	 </dl>
	</div>
	<div class="small-12 medium-6 large-6 columns">
		
	</div>
	</div>


	

	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php $a="aa"; echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->