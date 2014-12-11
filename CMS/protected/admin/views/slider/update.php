<?php
/* @var $this SliderController */
/* @var $model Slider */

$this->layout='main';
$this->setPageTitle('Sliders Management');

$this->menu=array(
	array('label'=>'Create Slider', 'url'=>array('create')),
	array('label'=>'View Slider', 'url'=>array('index')),
);

$data=$dataProvider;
$data= $data->getData();
?>

<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-8 medium-offset-2 large-8 large-offset-2 columns">

<fieldset>		
<legend>Update Slider</legend>
<div class="right">
<?php echo CHtml::link('Delete',"#", array("submit"=>array('delete', 'id'=>$model->slider_id), 'confirm' => 'Are you sure you want to delete?'), array('class'=>'button tiny')); ?>
</div>
<?php $this->renderPartial('_form', array('model'=>$model, 'data'=>$data)); ?>
</fieldset>	
</div>
</div>
</div>	