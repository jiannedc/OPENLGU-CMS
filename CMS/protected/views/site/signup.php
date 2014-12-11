<?php
/* @var $this SiteController */
/* @var $form CActiveForm  */

$this->setPageTitle('Sign Up');
$this->breadcrumbs=array(
	'Sign Up',
);
$this->layout='page';
?>

<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<div class="form">
<?php if(Yii::app()->user->hasFlash('signup')){ ?>
<div data-alert class="alert-box success radius">
	<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('signup'); ?>
	</div>
  <a href="#" class="close">&times;</a>
</div>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>		
	<legend>Sign Up</legend>
	
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
	</div>
	<div class="row">
	<div class="small-12 medium-4 large-4 columns">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('size'=>25,'maxlength'=>25)); ?>
		<?php  echo $form->error($model,'username');?>
		
	</div>
	<div class="small-12 medium-4 large-4 columns">		
			<?php echo $form->labelEx($model,'password'); ?>		
			<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
			<?php  echo $form->error($model,'password'); ?>
	</div>	
	<div class="small-12 medium-4 large-4 columns">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<input type="email" maxlength="50" name="User[email_address]" id="User_email_address" class="<?php  if($form->error($model,'email_address') != "") echo 'error'?>" value="<?php echo $model->email_address;?>" />
		<?php  echo $form->error($model,'email_address'); ?>
	</div>
	</div>
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'occupation'); ?>
		<?php echo $form->textField($model,'occupation',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'occupation'); ?>
	</div>
	</div>
	<div class="row">
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'address'); ?>
		<textarea maxlength="100" name="User[address]" class="<?php  if($form->error($model,'address') != "") echo 'error'?>" id="User_address" value="<?php echo $model->address;?>"></textarea>
		<?php echo $form->error($model,'address'); ?>
	</div>
	<div class="small-12 medium-6 large-6 columns">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->radioButton($model,'user_type',array('value'=>'Resident', 'uncheckValue'=>null)); ?> <strong>Resident</strong><br />
		<?php echo $form->radioButton($model,'user_type',array('value'=>'Business', 'uncheckValue'=>null)); ?> <strong>Business Owner</strong>
		<?php if($form->error($model,'user_type')!= "") echo "<div class=errorMessage>Please select from the choices above.</div>"; ?>
	</div>
	</div>	
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'button expand')); ?>
	</div>
	</div>	
		
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
</div>	


