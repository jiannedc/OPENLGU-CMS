<?php
/* @var $this UserController */
/* @var $model User */

$this->layout="main";
$this->setPageTitle('User Management');
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	
	array('label'=>'List User', 'url'=>array('index')),	
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Pending User', 'url'=>array('pending')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<fieldset>		
<legend>User Number <?php echo $model['user_id'];?></legend>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Name: <strong> <?php echo $model['first_name'];?> <?php echo $model['last_name'];?></strong></h4>
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Username: <strong> <?php echo $model['username'];?> </strong></h4>
</div>
</div>

<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Email Address: <strong><?php echo $model['email_address'];?></strong> </h4>
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Contact Number:<strong> <?php echo $model['contact_no'];?></strong> </h4>
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">User Type:<strong> <?php echo $model['user_type'];?></strong> </h4>
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Occupation:<strong> <?php echo $model['occupation'];?></strong> </h4>
</div>
</div>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
		<h4 class="subheader">Address: <strong> <?php echo $model['address'];?></strong>  </h4>
</div>
</div>
</fieldset>	
