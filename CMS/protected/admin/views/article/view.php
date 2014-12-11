<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->layout='main';
$this->setPageTitle('Article Management');
$this->menu=array(
	array('label'=>'View All Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Add Article Photo', 'url'=>array('articlephoto/create')),
);
?>
<div class="article">
<header class="view-header">
		<h3 class="view-title"><a href="#"><?php echo $model->article_header ?></a></h3>
		<div class="view-meta">Published on <?php $date = new DateTime($model->date_published); echo date_format($date, 'F j\, Y');	 ?></div>
</header>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<div class="view-content"><p>
	<?php echo $model->article_body ?>
</p>
</div>
</div>
</div>
<?php if($photos != null){
?>
<h6>PHOTO RELEASE</h6>
<?php 
	foreach($photos as $photo){
?>
<div class="row">
<div class="small-12 medium-8 medium-offset-2 large-8 large-offset-2 columns">
<img class="entry-image" src="images/<?php echo $photo['filename'];?>">
</div>
</div>
<?php }}?>
</div>