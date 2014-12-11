<?php
/* @var $this SpageController */
/* @var $model Spage */
$this->layout='main';
$this->setPageTitle('Static Pages Management');

$this->menu=array(
	array('label'=>'View All Pages', 'url'=>array('index')),
	array('label'=>'Create New Page', 'url'=>array('create')),
);
?>
<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-12 large-10 large-offset-1 columns">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>	