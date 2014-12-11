<?php
/* @var $this ArticlePhotoController */
/* @var $data ArticlePhoto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_photo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->article_photo_id), array('view', 'id'=>$data->article_photo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php echo CHtml::encode($data->article_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_id')); ?>:</b>
	<?php echo CHtml::encode($data->photo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_order')); ?>:</b>
	<?php echo CHtml::encode($data->display_order); ?>
	<br />


</div>