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
<div class="metro"><h3>Update Article <?php echo $model->article_id; ?></h3></div><br />
<?php $this->renderPartial('_form', array('model'=>$model)); ?>