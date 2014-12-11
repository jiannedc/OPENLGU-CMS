<?php
/* @var $this FileController */
/* @var $model File */
$this->setPageTitle('File management');
$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Upload File', 'url'=>array('create')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);

?>
<div class="metro">
<h3>Manage Files</h3>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'file_id',
		'title',
		'description',
		'file_location',
		'download_access',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
