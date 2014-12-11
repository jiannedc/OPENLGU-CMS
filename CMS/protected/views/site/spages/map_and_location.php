<?php
	$this->layout='page';
	$this->setPageTitle($model->title);
	
	$this->breadcrumbs=array(
		$model->title,
	);

?>

<div class="row">
<div class="small-12 medium-8 large-8 columns">
	<h1 class="page-title"><?php echo $model->title?></h1>
	<div class="page-meta"></div>
	<div class="page-content"><?php echo $model->content?></div>
	<?php
	$lgu_data = Yii::app()->db->createCommand()
			->select('*')
			->from('lgu_data')
			->where('active=:active', array(':active'=>TRUE))
			->queryRow();
	echo $lgu_data['google_map'];
	?>
	
</div>
	<?php $this->renderPartial('//layouts/_sideContent'); ?>
</div>
