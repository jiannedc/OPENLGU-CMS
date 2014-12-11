<?php
/* @var $this SiteController */
$this->layout='home';
$this->pageTitle=Yii::app()->name;



?>

<div class="small-12 medium-8 large-8 columns">
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
			<li>
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
			</li>
			<?php }?>
			</ul>
		</section>			
		
		</div>
		</div>
		<div class="row">
		<div class="small-12 medium-12 large-12 columns">
		<div class="tabs-container">
		<dl class="tabs" data-tab>
			<dd class="active"><a href="#panel2-1">LATEST NEWS</a></dd>
			<dd><a href="#panel2-2">LATEST PUBLICATIONS</a></dd>
		</dl>
		<div class="tabs-content">
			<div class="content active" id="panel2-1">
				<ul class="article-list">
					<?php
							foreach($news as $news1){
					?>
					<li>
					<article class="entry-block">
					<header class="entry-header">
						<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($news1['article_header']), array('article/view', 'id'=>$news1['article_id'])); ?></h3>
						<div class="entry-meta">Published on <?php $date = new DateTime($news1['date_published']); echo date_format($date, 'F j\, Y');	 ?></div>
					</header>
					<div class="row">
					<?php 
						$photo = Yii::app()->db->createCommand()
						->select('p.filename, p.title, p.caption')
						->from('photo p')
						->join('article_photo ap', 'ap.photo_id = p.photo_id')
						->where('ap.article_id=:article_id ', array(':article_id'=>$news1['article_id']))
						->queryRow();
						
						if($photo!=null){
					?>

					<div class="small-12 medium-5 large-4 columns">
					<img class="entry-image" src="images/<?php echo $photo['filename'];?>">
					</div>
					<div class="small-12 medium-7 large-8 columns">
					<?php }else{ ?>
					<div class="small-12 medium-12 large-12 columns">
					<?php }?>
					<div class="entry-preview"><p>
						<?php 
							 $article_preview = strip_tags($news1['article_body']);
							 
							 if (strlen($article_preview) > 375) {
								$temp = substr($article_preview, 0, 375);
								$article_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='index.php?r=article/view&id=".$news1['article_id']."' class='read-more'>Read more</a>";
							}
							echo $article_preview;
							
						?>
					</p>
					</div>
					</div>
					</div>
					<footer class="entry-meta">
						<span>
						</span>
					</footer>
					</article>
					</li>
					<?php } ?>
				</ul>
				<footer class="tab-meta">
					<a href="#">View All News >></a>
				</footer>
			</div>
			<div class="content" id="panel2-2">
			<ul class="article-list">
					<?php
							foreach($publications as $publication){
					?>
					<li>
					<article class="entry-block">
					<header class="entry-header">
						<div class="row">
						<div class="small-12 medium-6 large-8 columns">
						<h3 class="entry-title"><?php echo CHtml::link(CHtml::encode($publication['article_header']), array('article/view', 'id'=>$publication['article_id'])); ?></h3>
						<div class="entry-meta">Published on <a href="#"><?php $date = new DateTime($publication['date_published']); echo date_format($date, 'F j\, Y');	 ?></a></div>
						</div>
						<div class="small-12 medium-6 large-4 columns">
						<ul class="button-group even-2">
							<li>
							<?php echo CHtml::link('Preview', Yii::app()->request->baseUrl.'/uploads/'.$publication['file_location'], array( 'class' => 'button tiny', 'target'=>'_blank'));   ?>
							</li>
							<li>
							<?php 
								echo CHtml::link('Download', $this->createUrl('site/download', array('filename' =>  $publication['file_location'])), 
								array(
								   // for htmlOptions
								   'onclick' => ' {' . CHtml::ajax(array(
															'type'=>'POST',
															'url'=>$this->createUrl('site/download', array('filename' =>  $publication['file_location'])))),
								   'class' => 'button tiny',
								   )
								);
							?>
							</li>
							</ul>
						</div>
						</div>
					</header>				
					<div class="entry-preview"><p>
					<?php 
							 $article_preview = strip_tags($publication['article_body']);
							 
							 if (strlen($article_preview) > 200) {
								$temp = substr($article_preview, 0, 200);
								$article_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='#' class='read-more'>Read more</a>";
							}
							echo $article_preview;
					?>
					</p>
					</div>
					<footer class="entry-meta">
						<span>
						</span>
					</footer>
					</article>
					</li>
					<?php } ?>
					<li>
				</ul>					
				<footer class="tab-meta">
					<a href="#">View All Publications >></a>
				</footer>
			</div>
		</div>
		</div>
		</div>
		</div>			
		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
			<section class="home-gallery">
			
			<header>
				Gallery
			</header>
			<?php 						
				if($gallery_photos!=null){						
			?>
			<ul class="medium-block-grid-2 large-block-grid-4 clearing-thumbs" data-clearing>
			<?php 
				foreach($gallery_photos as $gallery_photo){
			?>
			<li><a class="th">
				<img data-caption="<?php echo $gallery_photo['caption'];?>" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$gallery_photo['filename']; ?>">
			</a></li>
			<?php }?>
			</ul>
			<?php }?>
			</section>
			</div>	
		</div>
		<div class="row">
		<div class="small-12 medium-12 large-6 columns">
		<section id="video_section" class="section <?php if($lgu_data['show_video']!=TRUE||$lgu_data['video_url']==""){ echo "hide";} ?>">
			<header class="section-header">
				<h3 class="section-title"><a href="#">FEATURED VIDEO</a></h3>
			</header>				
			<div class="section-content">
				<div class="flex-video">
					<?php if($lgu_data['video_url']!=""){ echo $lgu_data['video_url'];} ?>
				</div>
			</div>
			<footer class="section-meta">
			</footer>
		</section>
		</div>
		<div class="small-12 medium-12 large-6 columns">
		<section id="events_section" class="section  <?php if($lgu_data['show_events']!=TRUE){ echo "hide";} ?>">
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
				<li>
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
				</li>
				<?php }?>
				
			</ul>
			</div>
			<footer class="section-meta">
			</footer>
		</section>
		</div>
		</div>
	</div>
	<?php 
		$this->renderPartial('//layouts/_sideContent');
	?>
