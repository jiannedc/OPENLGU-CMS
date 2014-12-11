<?php
/* @var $this SpageController */
/* @var $model Spage */

$this->breadcrumbs=array(
	'Spages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Spage', 'url'=>array('index')),
	array('label'=>'Create Spage', 'url'=>array('create')),
	array('label'=>'Update Spage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Spage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Spage', 'url'=>array('admin')),
);
?>

<h1>View Spage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'title',
		'content',
		'is_published',
		'layout',
	),
)); ?>
