<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	'action' => CController::createUrl('photo/update&id=', array('id'=>$model->photo_id)), 
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<ul class="pricing-table">
  <li class="price"><img src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($model->filename); ?>" /><span class="text-label"><?php echo CHtml::activeFileField($model,'filename'); ?></span></li>  
  <li class="bullet-item"><span class="text-label ">Title </span><?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?></li>  
  <!--li class="bullet_item text-center"><span class="text-label ">Filename </span></li-->  
  <li class="description"><span class="text-label ">Caption </span><?php echo $form->textArea($model,'caption',array('rows'=>6, 'cols'=>50)); ?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Banner? </span><?php echo $form->checkBox($model,'show_banner'); ?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Gallery? </span><?php echo $form->checkBox($model,'show_gallery'); ?></li>
  <li class="cta-button"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'button expand tiny')); ?>
</ul>
<?php $this->endWidget(); ?>