<?php
/* @var $this ServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='main';
$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Create',
);
$this->setPageTitle('Services Management');
$this->menu=array(
	array('label'=>'List Services', 'url'=>array('index')),
	array('label'=>'Create Services', 'url'=>array('create')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'itemsTagName'=>'ul',
	'itemsCssClass'=>'article-list',
)); ?>
