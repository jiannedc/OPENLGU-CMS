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
<div class="row">
<div class="small-12 large-12 columns">
<fieldset>		
<legend>Add/Upload Downloadable Files</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</fieldset>	
</div>
</div>