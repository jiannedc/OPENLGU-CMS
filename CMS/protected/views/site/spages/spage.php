<?php
	$this->layout='page';
	$this->setPageTitle($model->title);
	
	$this->breadcrumbs=array(
		$model->title,
	);

?>

<div class="row">
<div class="small-12 medium-8 large-8 columns">

<?php if (Yii::app()->user->isAdmin()){?>
<dl class="sub-nav">
	<dt>Admin Options:</dt>
  <!--dd class="active"><a href="#">All</a></dd-->
  <dd class="active"><a href="#">View Page</a></dd>
  <dd><a href="<?php echo Yii::app()->request->baseUrl."/admin.php?r=spage/update&id=".$model->id; ?>">Edit Page</a></dd>
</dl>
<?php } ?>

	<h1 class="page-title"><?php echo $model->title?></h1>
	<div class="page-meta"></div>
	<div class="page-content"><?php echo $model->content?></div>
</div>

	<?php $this->renderPartial('//layouts/_sideContent'); ?>
</div>
