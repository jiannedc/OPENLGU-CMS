<?php
/* @var $this SiteController */
/* @var $form CActiveForm  */
$this->setPageTitle('Log In');
$this->breadcrumbs=array(
	'Log In',
);
$this->layout='page';
?>

<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-6 medium-offset-3 large-4 large-offset-4 columns">
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<fieldset>		
	<legend>Login</legend>
	
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<div class="small-5 columns">
			<?php echo $form->labelEx($model,'username', array('class' => 'right inline')); ?>
		</div>
		<div class="small-7 columns">
			<?php echo $form->textField($model,'username'); ?>
			<?php  echo $form->error($model,'username'); ?>
		</div>
	</div>
	</div>
	<div class="row">		
	<div class="small-12 medium-12 large-12 columns">
		<div class="small-5 columns">
			<?php echo $form->labelEx($model,'password', array('class' => 'right inline')); ?>
		</div>
		<div class="small-7 columns">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>			
		</div>
	</div>
	</div>
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<?php echo CHtml::submitButton('Login', array('class'=>'button expand')); ?>
		</div>
		</div>
	</fieldset>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>	


