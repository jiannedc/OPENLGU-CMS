<?php
/* @var $this LguDataController */
/* @var $model LguData */

$this->breadcrumbs=array(
	'Lgu Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LguData', 'url'=>array('index')),
	array('label'=>'Create LguData', 'url'=>array('create')),
	array('label'=>'Update LguData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LguData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LguData', 'url'=>array('admin')),
);
?>

<h1>View LguData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'logo_location',
		'agency_name',
		'tagline',
		'address',
		'contact_no',
		'fax_no',
		'email_address',
		'facebook_link',
		'twitter_link',
		'police_hotline',
		'fire_hotline',
		'hospital_hotline',
		'traffic_hotline',
		'disaster_hotline',
		'active',
	),
)); ?>
