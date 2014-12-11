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
<div class="small-12 medium-12 large-10 large-offset-1 columns">
<fieldset>		
<legend>Create Slider</legend>

<?php $this->renderPartial('_form', array('model'=>$model, 'data'=>$data)); ?>
</fieldset>	
</div>
</div>
</div>	


