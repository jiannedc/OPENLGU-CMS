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

<h1>View ArticlePhoto #<?php echo $model->article_photo_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'article_photo_id',
		'article_id',
		'photo_id',
		'display_order',
	),
)); ?>
