<?php
/* @var $this SpageController */
/* @var $data Spage */
?>
<li>	
	<div class="row">
	<div class="small-9 medium-9 large-9 columns">
	<article class="entry-block">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($data->title), $this->createurl('site/page',  array('view' => $data->url))); ?></h3>
		<div class="entry-meta"></div>
	</header>
	<div class="row">
	<div class="small-12 medium-12 large-12 columns">
	<div class="entry-preview"><p>
		<?php 
		$content_preview = strip_tags($data->content);
		if (strlen($content_preview) > 375) {
			$temp = substr($content_preview, 0, 375);
			$content_preview = substr($temp, 0, strrpos($temp, ' '))." ... ".CHtml::link('Read More', $this->createurl('site/page',  array('view' => $data->url)), array('class'=>'read-more'));
		}
		echo $content_preview;
		?>
	</p>
	</div>
	</div>
	</div>
	<footer class="entry-meta">
	</footer>
	</article>
	</div>
	<div class="small-3 medium-3 large-3 columns">
		<br />
		<ul class="button-group even-2 expand">
		<li>
		<?php 	
				echo CHtml::link('Edit', $this->createUrl('spage/update', array('id' => $data->id)), array('class' => 'button tiny')); 
		?>
		</li>
		<li>
		<?php	echo CHtml::link('Delete', $this->createUrl('spage/delete', array('id' => $data->id)), 
				array(
				   'onclick' => ' {' . CHtml::ajax(array(
							'type'=>'POST',
							'url'=>$this->createUrl('spage/delete', array('id' => $data->id)),
							   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
							   'success' => "js:function(html){  window.location.reload(true); }")) .
							   'return false;}', // returning false prevents the default navigation to another url on a new page 
					'class' => 'button tiny',
				   )
			   );?>
		</li>
		 </ul>
	</div>
	</div>
</li>
