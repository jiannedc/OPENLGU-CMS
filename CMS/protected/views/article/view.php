<?php
/* @var $this ArticleController */
/* @var $model Article */
$this->layout='page';
$this->breadcrumbs=array(
	$model->article_type=>array($model->article_type),
	$model->article_header,
);
$this->setPageTitle("Articles");
?>

<?php if (Yii::app()->user->isAdmin()){?>
<dl class="sub-nav">
	<dt>Admin Options:</dt>
  <!--dd class="active"><a href="#">All</a></dd-->
  <dd class="active"><a href="#">View Article</a></dd>
  <dd><a href="<?php echo Yii::app()->request->baseUrl."/admin.php?r=article/update&id=".$model->article_id; ?>">Edit Article</a></dd>
</dl>
<?php } ?>
<div class="row">
<div class="small-12 medium-8 large-8 columns">
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
<div class="caption">
	<?php echo $photo['caption'];?>
</div>
</div>
</div>
<?php }}?>
</div>
</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>
</div>
