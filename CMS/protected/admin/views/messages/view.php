<?php
/* @var $this MessagesController */
/* @var $model Messages */

$this->layout="main";
$this->setPageTitle('Messages Management');

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'View All Messages', 'url'=>array('index')),
	array('label'=>'Delete Messages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<div class="article">
<header class="view-header">
		<h3 class="view-title"><a href="#"><?php echo $model->subject; ?></a></h3>
		<div class="view-meta">From: <?php echo $model->name; ?> < <?php echo $model->email_address; ?> > </div>
</header>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<div class="view-content"><p>
	<?php echo $model->body ?>
</p>
</div>
</div>
</div>
</div>