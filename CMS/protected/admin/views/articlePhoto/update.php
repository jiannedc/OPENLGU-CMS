<?php
/* @var $this ArticlePhotoController */
/* @var $model ArticlePhoto */

$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);
?>

<h1>Update ArticlePhoto <?php echo $model->article_photo_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>