<?php
/* @var $this ServicesController */
/* @var $dataProvider CActiveDataProvider */
$this->layout='page';
$this->setPageTitle('Services');
$this->breadcrumbs=array(
	'Services'
);
$data=$dataProvider;
$data= $data->getData();

?>


<div class="row">
<div class="small-12 medium-8 large-8 columns">

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>'{sorter} {items} {pager}',
	'itemsTagName'=>'ul',
	'itemsCssClass'=>'article-list',
)); ?>
</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>

