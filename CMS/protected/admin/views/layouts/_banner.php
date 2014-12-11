<?php

?>

<div class="row">
	<div class="small-12 large-12 columns">
	<?php 
		$banner_photos = Yii::app()->db->createCommand()
					->select()
					->from('photo')
					->where('show_banner=:show_banner', array('show_banner'=>'TRUE'))
					->queryAll();
					
	if($isHome && $banner_photos!=null){
		
	
	
	?>

		<div class="orbit-wrapper">
		<ul data-orbit
			data-options="animation:slide;
						  animation_speed:1000;
						  pause_on_hover:true;
						  animation_speed:500;
						  navigation_arrows:true;
						  bullets:false;">
		<?php 
			foreach($banner_photos as $banner_photo){
		
		?>
		<li>
			<img width="100%" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$banner_photo['filename']; ?>" />
			<div class="orbit-caption">
			  <?php echo $banner_photo['caption']; ?>
			</div>
		 </li>
		 <?php }?>
		</ul>
		</div>
	<?php }else{ ?>
		<div class="pageTitle">
			<?php echo $this->pageTitle;?>
		</div>
	<?php }?>

	</div>
</div>
