<?php
/* @var $this ArticleController */
/* @var $model Article */
$this->layout='main';
$this->setPageTitle('LGU Data Management');
$this->menu=array(
	array('label'=>'List Lgu Data', 'url'=>array('index')),
	array('label'=>'Create LguData', 'url'=>array('create')),
);
?>
<div class="fieldset-container">
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<fieldset>		
<legend>Update LGU Data</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
</div>
</div>
</div>	
