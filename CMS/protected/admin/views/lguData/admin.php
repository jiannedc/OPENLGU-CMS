<?php
/* @var $this LguDataController */
/* @var $model LguData */

$this->breadcrumbs=array(
	'Lgu Datas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LguData', 'url'=>array('index')),
	array('label'=>'Create LguData', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lgu-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lgu Datas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lgu-data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'logo_location',
		'agency_name',
		'tagline',
		'address',
		'contact_no',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
