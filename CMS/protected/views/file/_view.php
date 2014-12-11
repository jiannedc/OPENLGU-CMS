<?php
/* @var $this ArticleController */
/* @var $data Article */
?>
<li>
	<article class="entry-block">
	<div class="row">
	<div class="small-12 medium-6 large-8 columns">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::encode($data->title); ?></h3>
		<div class="entry-meta"><?php echo CHtml::encode($data->description); ?></div>
	</header>
	</div>
	<div class="small-12 medium-6 large-4 columns">
		<ul class="button-group even-2">
		<li>
		<?php echo CHtml::link('Preview', Yii::app()->request->baseUrl.'/uploads/'.$data->file_location, array( 'class' => 'button tiny', 'target'=>'_blank'));   ?>
		</li>
		<li>
		<?php 
			echo CHtml::link('Download', $this->createUrl('site/download', array('filename' =>  $data->file_location)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
					'type'=>'POST',
					'url'=>$this->createUrl('site/download', array('filename' =>  $data->file_location)))),
					'class' => 'button tiny',
			   )
			);
		?>
		</li>
		</ul>
	</div>
	</div>
	</article>
</li>
