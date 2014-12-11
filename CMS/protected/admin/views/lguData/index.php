<?php
/* @var $this LguDataController */
/* @var $dataProvider CActiveDataProvider */
$this->layout="main";
$this->setPageTitle('LGU Data Management');

$this->menu=array(
	array('label'=>'List Lgu Data', 'url'=>array('index')),
	array('label'=>'Create LguData', 'url'=>array('create')),
);
?>
<dl class="tabs" data-tab>
	<dd class="active"><a href="#panel2-1">Active Data</a></dd>
	<dd><a href="#panel2-2">Drafts</a></dd>
</dl>
<div class="tabs-content">
	<div class="content active" id="panel2-1">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider_active,
		'itemView'=>'_view',
		'template'=>'{sorter} {items} {pager}',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'article-list',
	)); ?>
	</div>
<div class="content" id="panel2-2">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider_draft,
		'itemView'=>'_view',
		'template'=>'{sorter} {items} {pager}',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'article-list',
	)); ?>
 </div>
</div>