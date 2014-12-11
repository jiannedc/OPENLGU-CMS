<?php
/* @var $this ServicesController */
/* @var $data Services */
?>

<li>
	<article class="entry-block">
	<header class="entry-header">
		<div class="row clearfix">
		<div class="left">
		<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($data->service_name), array('view', 'id'=>$data->service_id)); ?></h3>
		<div class="entry-meta"><?php echo $data->service_description ?></div>
		</div>
		<ul class="button-group right">
			<?php
			echo "<li>".CHtml::link('<i class=foundicon-edit></i>EDIT', $this->createUrl('services/update', array('id' => $data->service_id)), 
				array(
				   'class' => 'button tiny',
				   )
			   )."</li>";
			echo "<li>".CHtml::link('<i class=foundicon-trash></i>DELETE', $this->createUrl('services/delete', array('id' => $data->service_id)), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
									'type'=>'POST',
									'url'=>$this->createUrl('services/delete', array('id' => $data->service_id)),
									   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
									   'success' => "js:function(html){  window.location.reload(true); }")) .
									   'return false;}', // returning false prevents the default navigation to another url on a new page 
				   'class' => 'button tiny',
				   )
			   )."</li>";;
			?>
		</ul>
		</div>
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
		<?php if($data->procedures!=""){?>
			<h3>Procedures</h3>
			<div class="entry-preview">
				<?php echo $data->procedures; ?>
			</div>
		<?php } ?>
		<?php if($data->requirements!=""){?>
			<h3>Requirements</h3>
			<div class="entry-preview">
				<?php echo $data->requirements; ?>
			</div>
		<?php } ?>
	
	</div>
	</div>
	<footer class="entry-meta">
		<span>
		</span>
	</footer>
	</article>
</li>

