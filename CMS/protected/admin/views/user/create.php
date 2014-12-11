<?php
/* @var $this UserController */
/* @var $model User */
$this->layout="main";
$this->setPageTitle("User Management");
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),	
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Pending User', 'url'=>array('pending')),	
);
?>

<div class="row">
<div class="small-12 medium-12 large-12 columns">

<fieldset>		
<legend>Create User</legend>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>
</div>
</div>