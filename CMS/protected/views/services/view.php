<?php
/* @var $this ServicesController */
/* @var $model Services */
$this->layout='page';
$this->setPageTitle($model->service_name);
$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->service_name,
);
?>

<div class="row">
<div class="small-12 medium-8 large-8 columns">
<?php if (Yii::app()->user->isAdmin()){?>
<dl class="sub-nav">
	<dt>Admin Options:</dt>
  <!--dd class="active"><a href="#">All</a></dd-->
  <dd class="active"><a href="#">View Service</dd>
  <dd><a href="<?php echo Yii::app()->request->baseUrl."/admin.php?r=services/update&id=".$model->service_id; ?>">Edit Service</a></dd>
  <dd><?php 
		echo CHtml::link('Delete Page', $this->createUrl('services/delete', array('id' => $model->service_id)), 
					array(
					   'onclick' => ' {' . CHtml::ajax(array(
									'type'=>'POST',
									'url'=>$this->createUrl('services/delete', array('id' => $model->service_id)),
									   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
									   'success' => "js:function(html){  window.location.reload(true); }")) .
									   'return false;}', // returning false prevents the default navigation to another url on a new page 
				));
  ?></dd>
</dl>
<?php } ?>
<div class="article">
<header class="view-header">
		<h3 class="view-title"><a href="#"><?php echo $model->service_name ?></a></h3>
		<div class="view-meta"><?php echo $model->service_description ?></div>
</header>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<div class="view-content"><p>
	<?php echo $model->content ?>
</p>
<?php if($model->procedures!="") { ?>
<div class="section_subheader">
<header>Procedures</header>
<p><?php  echo $model->procedures; ?></p>
</div>
<?php } ?>
<?php if($model->requirements!="") { ?>
<div class="section_subheader">
<header>Requirements</header>
<p><?php echo $model->requirements; ?></p>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>
</div>