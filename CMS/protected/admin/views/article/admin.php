<?php
/* @var $this ArticleController */
/* @var $model Article */
$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);

?>

<div class="metro"><h3>Manage Articles</h3></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'article_id',
		'article_header',
		'article_body',
		'article_type',
		//'auto_delete',
		//'auto_delete_date',
		
		'is_published',
		'is_featured',
		'date_published',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
