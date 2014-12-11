<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>
<div class="row">
<div class="small-12 medium-5 large-4 columns">
	<a onclick="viewDetails(<?php echo $data->photo_id?>)"><img class="entry-image" src="images/<?php echo CHtml::encode($data->filename);?>"></a>
</div>
<div class="small-12 medium-7 large-8 columns">
	<div class="entry-preview">
	
	<span class="text-label"><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</span>
	<span class="entry-meta"><?php echo CHtml::encode($data->title); ?></span>
	<br />

	
	<div class="entry-meta"><span class="text-label"><?php echo CHtml::encode($data->getAttributeLabel('caption')); ?>:</span><?php echo CHtml::encode($data->caption); ?></div>
	<br />

	<div class="text-label">Shown in Banner?</div>
	<div class="text-label default-text"><?php if($data->show_banner==1) echo "YES"; else echo "NO"; ?></div>

	<div class="text-label">Shown in Gallery?</div>
	<div class="text-label default-text"><?php if($data->show_gallery==1) echo "YES"; else echo "NO"; ?></div>
	<br />
	</div>
</div>
</div>