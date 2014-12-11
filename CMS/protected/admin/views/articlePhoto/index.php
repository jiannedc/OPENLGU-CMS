<?php
/* @var $this ArticlePhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);
?>

<h1>Article Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
