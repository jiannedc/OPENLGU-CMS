<?php
/* @var $this SpageController */
/* @var $dataProvider CActiveDataProvider */
$this->layout='main';
$this->setPageTitle('Static Pages Management');

$this->menu=array(
	array('label'=>'View All Pages', 'url'=>array('index')),
	array('label'=>'Create New Page', 'url'=>array('create')),
);
?>

<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'title'=>'Title',
        'url'=>'By Url',
    ),
	'template'=>'{sorter} {items} {pager}',
	'itemsTagName'=>'ul',
	'itemsCssClass'=>'article-list',
));  ?>
