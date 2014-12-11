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

<h1>View Services #<?php echo $model->service_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'service_id',
		'service_name',
		'service_description',
		'content',
		'procedures',
		'requirements',
	),
)); ?>

</div>
</div>