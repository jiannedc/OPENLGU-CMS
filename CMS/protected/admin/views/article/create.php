<?php
/* @var $this ArticleController */
/* @var $model Article */
$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);

?>

<div class="row">
<div class="small-12 medium-12 large-12 columns">

<fieldset>		
<legend>Create Article</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
</div>
</div>