<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$pageTitle
);
$this->setPageTitle($pageTitle);
$this->layout='page';
?>


<div class="row">
<div class="small-12 medium-8 large-8 columns">

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'article_header'=>'Title',
        'date_published'=>'Date Posted',
    ),
	'template'=>'{sorter} {items} {pager}',
	'itemsTagName'=>'ul',
	'itemsCssClass'=>'article-list',
)); ?>
</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>
</div>