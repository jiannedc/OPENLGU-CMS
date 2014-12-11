<?php
/* @var $this SliderController */
/* @var $dataProvider CActiveDataProvider */
$this->layout='main';
$this->setPageTitle('Sliders Management');

$this->menu=array(
	array('label'=>'Create Slider', 'url'=>array('create')),
	array('label'=>'View Slider', 'url'=>array('index')),
);
?>
<div data-alert class="alert-box info radius">
  Click the image to edit content.
  <a href="#" class="close">&times;</a>
</div>

<h2><strong>Headline Slider</strong></h2>
<div class="row">
<div class="small-12 medium-12 large-12 columns">
<section class="home-orbit shadow">	
	<ul class="orbit-wrapper" data-orbit
		data-options="animation:slide;
		animation_speed:500;
		pause_on_hover:true;
		animation_speed:500;
		resume_on_mouseout: true;
		navigation_arrows:true;
		bullets:false;
		swipe: true;">
	<?php 
			foreach($headlines as $headline){
	?>
	<li><a href="<?php echo "admin.php?r=slider/update&id=".$headline['slider_id']; ?>">
		<?php if(isset($headline['has_image']) && $headline['has_image']!='1') {?>
		<div class="orbit-content">
		<div class="text_only">
				<header><?php if($headline['header']!=''){ echo $headline['header']; }  ?></header>
				<span class="caption ">
				<?php 
					 $article_preview = strip_tags($headline['caption']);
					 
					 if (strlen($article_preview) > 400) {
						$temp = substr($article_preview, 0, 400);
						$article_preview = substr($temp, 0, strrpos($temp, ' '));
					}
					echo $article_preview;
				?>
				</span><br />
				<span class="sub1"><?php if($headline['event_date']!=''){ echo $headline['event_date']; }  ?></span><br />
				<span class="sub2"><?php if($headline['venue']!=''){ echo $headline['venue']; }  ?></span>
		</div>
		</div>
	<?php } else {?>
		<div class="orbit-content">
			<img src="<?php echo Yii::app()->request->baseUrl.'/images/'.$headline['image']; ?>" alt="slide 2" />
			<?php if($headline['header']!=''){ ?>
			<div class="orbit-text">
				<header><?php echo $headline['header']; ?></header>
				<span class="caption">
				<?php 
					 $article_preview = strip_tags($headline['caption']);
					 
					 if (strlen($article_preview) > 250) {
						$temp = substr($article_preview, 0, 250);
						$article_preview = substr($temp, 0, strrpos($temp, ' '));
					}
					echo $article_preview;
				?>
				</span>
			</div>
			<?php }?>
		</div>
		<?php }?>
	</a>
	</li>
	<?php }?>
	</ul>
</section>			
</div>
</div>
<br />
<h2><strong>Events Slider</strong></h2>
<div class="row">
<div class="small-12 medium-12 large-6 large-offset-3 columns">
<section id="events_section" class="section">
	<header class="section-header">
		<h3 class="section-title"><a href="#">EVENTS</a></h3>
	</header>				
	<div class="section-content">
	<ul class="orbit-wrapper" data-orbit 
		data-options="animation:slide;
			animation_speed:200;
			pause_on_hover:true;
			animation_speed:200;
			resume_on_mouseout: true;
			swipe: true;
			navigation_arrows:false;
			slide_number:false;
			variable_height:true;">
		<?php 
			foreach($events as $event){
		?>
		<li><a href="<?php echo "admin.php?r=slider/update&id=".$event['slider_id']; ?>">
		<?php if(isset($event['has_image']) && $event['has_image']=='1') {?>
		<div class="orbit-image">
			<img src="<?php echo Yii::app()->request->baseUrl.'/images/'.$event['image']; ?>" />
			<?php if($event['header']!='') {?>
			<div class="caption">
					<header><?php echo $event['header']; ?></header>
					<?php if($event['caption']!='') {  ?>
					<div class="meta">
					<?php echo $event['caption'];?>
					</div>
					<?php }?>
			</div>
			<?php }?>
		</div>
		<?php } else {?>
			<div class="orbit-text">
				<header><?php if($event['header']!=''){ echo $event['header']; }  ?></header>
				<div class="caption"><?php if($event['caption']!=''){ echo $event['caption']; }?></div>							
				<div class="meta">
					<?php if($event['event_date']!=''){ echo $event['event_date']; } ?>
					<br />
					<?php if($event['venue']!=''){ echo $event['venue']; } ?>
				</div>
			</div>
		<?php }?>
		</a>
		</li>
		<?php }?>
		
	</ul>
	</div>
	<footer class="section-meta">
	</footer>
</section>
</div>
</div>

