<?php
/* @var $this PhotoController */
/* @var $model Photo */
$this->layout="main";
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Photo', 'url'=>array('index')),
	array('label'=>'Create Photo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#photo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="metro">
<h3>Manage Photos</h3>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'photo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'photo_id',
		'filename',
		'title',
		'caption',
		'show_banner',
		'show_gallery',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
