<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);


?>


<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel2-1">All Articles</a></dd>
  <dd><a href="#panel2-2">Announcements</a></dd>
  <dd><a href="#panel2-3">News</a></dd>
  <dd><a href="#panel2-4">Publications</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel2-1">
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
  <div class="content" id="panel2-2">
  <?php
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$announcement_dataProvider,
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
  <div class="content" id="panel2-3">
  <?php
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$news_dataProvider,
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
  <div class="content" id="panel2-4">
  <?php
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$publication_dataProvider,
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
</div>

