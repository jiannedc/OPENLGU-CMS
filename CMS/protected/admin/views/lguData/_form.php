<?php
/* @var $this LguDataController */
/* @var $model LguData */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lguData-form',
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
		<?php echo "Upload Logo:" ?>
		<?php echo CHtml::activeFileField($model,'logo_location'); ?>
		<?php echo $form->error($model,'logo_location'); ?>
	</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agency_name'); ?>
		<?php echo $form->textField($model,'agency_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'agency_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tagline'); ?>
		<?php echo $form->textField($model,'tagline',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'tagline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
	
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
	<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fax_no'); ?>
		<?php echo $form->textField($model,'fax_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'fax_no'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>
	</div>
	<div class="small-12 medium-6 large-6 columns">
	<div class="row">
		<?php echo $form->labelEx($model,'facebook_link'); ?>
		<?php echo $form->textArea($model,'facebook_link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'facebook_link'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'twitter_link'); ?>
		<?php echo $form->textArea($model,'twitter_link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'twitter_link'); ?>
	</div>
	</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'disclaimer'); ?>
		<?php echo $form->textArea($model,'disclaimer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'disclaimer'); ?>
	</div>
	
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
	<div class="row">
		<?php echo $form->labelEx($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright',array('size'=>25,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'show_video'); ?>
		<?php echo $form->checkBox($model,'show_video'); ?>
		<?php echo $form->error($model,'show_video'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'show_events'); ?>
		<?php echo $form->checkBox($model,'show_events'); ?>
		<?php echo $form->error($model,'show_events'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'video_url'); ?>
		<?php echo $form->textArea($model,'video_url'); ?>
		<?php echo $form->error($model,'video_url'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'google_map'); ?>
		<?php echo $form->textArea($model,'google_map'); ?>
		<?php echo $form->error($model,'google_map'); ?>
	</div>
	</div>
	<div class="small-12 medium-6 large-6 columns">	
	<div class="row">
		<?php echo $form->labelEx($model,'police_hotline'); ?>
		<?php echo $form->textField($model,'police_hotline',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'police_hotline'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fire_hotline'); ?>
		<?php echo $form->textField($model,'fire_hotline',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'fire_hotline'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'hospital_hotline'); ?>
		<?php echo $form->textField($model,'hospital_hotline',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'hospital_hotline'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'traffic_hotline'); ?>
		<?php echo $form->textField($model,'traffic_hotline',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'traffic_hotline'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'disaster_hotline'); ?>
		<?php echo $form->textField($model,'disaster_hotline',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'disaster_hotline'); ?>
	</div>
	</div>
	</div>
	
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">	
	<?php	
		echo $form->labelEx($model,'masthead_color');
		$this->widget('application.extensions.colorpicker.EColorPicker', 
			array(
				'name'=>'LguData[masthead_color]',
				'mode'=>'textfield',
				'fade' => false,
				'slide' => false,
				'curtain' => true,
				'value' => $model->masthead_color,
			)
		);
	?>
	</div>
	<div class="small-12 medium-6 large-6 columns">	
	<?php	
		echo $form->labelEx($model,'banner_color');
		$this->widget('application.extensions.colorpicker.EColorPicker', 
			array(
				'name'=>'LguData[banner_color]',
				'mode'=>'textfield',
				'fade' => false,
				'slide' => false,
				'curtain' => true,				
				'value' => $model->banner_color,
			)
		);
	?>
	</div>
	</div>
	
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->