<?php
	$this->layout='page';
	$this->setPageTitle("Gallery");
	
	$this->breadcrumbs=array(
		$model->title,
	);
	$gallery_photos = Yii::app()->db->createCommand()
					->select()
					->from('photo')
					->where('show_gallery=:show_gallery', array('show_gallery'=>'TRUE'))
					->queryAll();

?>

<div class="row">
<div class="small-12 medium-8 large-8 columns">
	<h1 class="page-title">Gallery</h1>
	<div class="page-meta"></div>
	<div class="page-content">
	<div id="thumb_view">
	<ul class="medium-block-grid-2 large-block-grid-4 clearing-thumbs" data-clearing>
		<?php 
			foreach($gallery_photos as $gallery_photo){
		?>
		<li><a class="th">
			<img data-caption="<?php echo $gallery_photo['caption'];?>" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$gallery_photo['filename']; ?>">
		</a></li>
		<?php }?>
	</ul>
	</div>
	</div>
</div>
	<?php $this->renderPartial('//layouts/_sideContent'); ?>
</div>
