<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->layout='main';
$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Create',
);
$this->setPageTitle('Services Management');
$this->menu=array(
	array('label'=>'List Services', 'url'=>array('index')),
	array('label'=>'Create Services', 'url'=>array('create')),
);
?>
<div class="row">
<div class="small-12 medium-12 large-12 columns">

<fieldset>		
<legend>Update Services</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</fieldset>	
</div>
</div>