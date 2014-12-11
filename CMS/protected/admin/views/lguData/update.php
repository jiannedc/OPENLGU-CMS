<?php
/* @var $this LguDataController */
/* @var $model LguData */

$this->layout='main';
$this->setPageTitle('LGU Data Management');

$this->menu=array(
	array('label'=>'List Lgu Data', 'url'=>array('index')),
	array('label'=>'Create LguData', 'url'=>array('create')),
);
?>
<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-8 medium-offset-2 large-8 large-offset-2 columns">
<fieldset>		
<legend>Update LguData <?php echo $model->id; ?></legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
</div>
</div>
</div>	