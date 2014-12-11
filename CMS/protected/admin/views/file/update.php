<?php
/* @var $this FileController */
/* @var $model File */

$this->setPageTitle('File management');
$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Upload File', 'url'=>array('create')),
	array('label'=>'Manage File', 'url'=>array('admin')),	
	array('label'=>'View File', 'url'=>array('view', 'id'=>$model->file_id)),
);
?>
<div class="metro">
<h3>Update File <?php echo $model->file_id; ?></h3>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>