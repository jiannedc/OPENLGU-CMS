<?php
/* @var $this ServicesController */
/* @var $data Services */
?>

<li>
	<article class="entry-block">
	<header class="entry-header">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($data->service_name), array('view', 'id'=>$data->service_id)); ?></h3>
		<div class="entry-meta"><?php echo $data->service_description ?></div>
	</header>
	<div class="row">
	<div class="entry-preview"><p>
		<?php  
			$content_preview = strip_tags($data->content);
			
			if (strlen($content_preview) > 375) {
				$temp = substr($content_preview, 0, 375);
				$content_preview = substr($temp, 0, strrpos($temp, ' '))." ... ";
			}
			echo $content_preview;
		?>
	</p>
		
	
	</div>
	</div>
	<footer class="entry-meta">
		<span>
		</span>
	</footer>
	</article>
</li>

