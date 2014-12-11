<?php
/* @var $this FileController */
/* @var $model File */
$this->setPageTitle('File management');
$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Upload File', 'url'=>array('create')),
	array('label'=>'Manage File', 'url'=>array('admin')),
	array('label'=>'Update File', 'url'=>array('update', 'id'=>$model->file_id)),
	array('label'=>'Delete File', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->file_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<div class="metro">
<h3>View File #<?php echo $model->file_id; ?></h3>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'file_id',
		'title',
		'description',
		'file_location',
		'file_type',
		'download_access',
	),
)); ?>
