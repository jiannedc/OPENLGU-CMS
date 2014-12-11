<?php
/* @var $this ArticlePhotoController */
/* @var $model ArticlePhoto */

$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('article/index')),
	array('label'=>'Create Article', 'url'=>array('article/create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);
?>
<div class="row">
<div class="small-12 medium-12 large-12 columns">

<fieldset>		
<legend>Add Article Photo</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
</div>
</div>