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
  <dd class="active"><?php echo CHtml::link('View Page', $this->createUrl('site/page', array('view' => $model->url)));?></dd>
  <dd><?php echo CHtml::link('Edit Page', $this->createUrl('spage/update', array('id' => $model->id)));?></dd>
  <dd><?php 
		echo CHtml::link('Delete Page', $this->createUrl('spage/delete', array('id' => $model->id)), 
					array(
					   'onclick' => ' {' . CHtml::ajax(array(
									'type'=>'POST',
									'url'=>$this->createUrl('spage/delete', array('id' => $model->id)),
									   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
									   'success' => "js:function(html){  window.location.reload(true); }")) .
									   'return false;}', // returning false prevents the default navigation to another url on a new page 
				));
  ?></dd>
</dl>
<?php } ?>

	<h1 class="page-title"><?php echo $model->title?></h1>
	<div class="page-meta"></div>
	<div class="page-content"><?php echo $model->content?></div>
	<img class="entry-image" src="images/earth.jpg">
</div>

	<?php 
	
	$this->renderPartial('//layouts/_sideContent'); ?>
</div>
