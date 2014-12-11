<aside class="small-12 medium-4 large-4 columns">
		<section id="container-seal" class="container-side">
			<div class="container-side-body">
				<a href="#"><img class="transparency-seal"alt="transparency-seal" src="images/gov/transparency-seal.png"></a>				
			</div>
		</section>
		<section id="container-services" class="container-side">
			<header class="container-side-header medium-icon">
				<a><span class="valign flaticon-group49"></span>SERVICES</a>
			</header>
			<div class="container-side-body">
				<table width="100%">
					<tbody>
					<tr>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=services/serviceFilter&service_type=civil_registry'; ?>" title="CIVIL REGISTRY"><span class="valign flaticon-big57"></span></a><div class="caption">CIVIL REGISTRY</div></td>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=services/serviceFilter&service_type=permits'; ?>" title="PERMITS & LICENSES"><span class="valign flaticon-signature2"></span></a><div class="caption">PERMITS & LICENSES</div></td>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=services/serviceFilter&service_type=business'; ?>" title="BUSINESS & INVESTMENT"><span class="valign flaticon-briefcase2"></span></a><div class="caption">BUSINESS & INVESTMENT</div></td>	
					</tr>
					<tr>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=file/index'; ?>" title="DOWNLOADABLE DOCUMENTS"><span class="valign flaticon-file3"></span></a><div class="caption">DOWNLOADABLE DOCUMENTS</div></td>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=site/page&view=job_listing'; ?>" title="PUBLIC EMPLOYMENT"><span class="valign flaticon-teach"></a></span><div class="caption">PUBLIC EMPLOYMENT</div></td>
						<td class="tiles"><a href="<?php echo Yii::app()->request->baseUrl.'/index.php?r=services/serviceFilter&service_type=health_welfare'; ?>" title="HEALTH & WELFARE"><span class="valign flaticon-familiar17"></a></span><div class="caption">HEALTH & WELFARE</div></td>
					</tr>
					</tbody>
				</table>
			</div>
		</section>
		<section id="container-services" class="container-side">
		<div class="container-side-body">
			<iframe frameborder=" 0" width="100%" height="120" src="http://oras.pagasa.dost.gov.ph/time_display/widget.php"></iframe>
		</div>
		</section>
		<section id="container-announcement" class="container-side">
			<header class="container-side-header medium-icon">
				<a><span class="valign flaticon-lecture1"></span>ANNOUNCEMENT</a>
			</header>
			<div class="container-side-body">
				<ul>
					<?php
					$announcements = Yii::app()->db->createCommand()
						->select()
						->from('article')
						->where('article_type=:article_type and is_featured=:is_featured', array(':article_type'=>'announcement', ':is_featured'=>'TRUE'))
						->queryAll();
							foreach($announcements as $announcement){
					?>
					<li>						
					<article>
						<header><?php echo CHtml::link(CHtml::encode($announcement['article_header']), array('article/view', 'id'=>$announcement['article_id']), array('class'=>'read-more')); ?></header>
						<p>
						<?php 
							$article_preview = strip_tags($announcement['article_body']);
							 $article_max=false;
							 if (strlen($article_preview) > 150) {
								$temp = substr($article_preview, 0, 150);
								$article_preview = substr($temp, 0, strrpos($temp, ' '))." ... ".CHtml::link("Read more", array('article/view', 'id'=>$announcement['article_id']), array('class'=>'read-more'));
								$article_max=true;
							}
							echo $article_preview;
						?>
						</p>
					</article>
					</li>
					<?php }?>
				</ul>
			</div>				
		</section>
		<section id="container-hotlines" class="container-side">
			<?php
				$lgu_data = Yii::app()->db->createCommand()
					->select()
					->from('lgu_data')
					->where('active=:active', array(':active'=>'TRUE'))
					->queryRow();
			?>
			 <header class="container-side-header medium-icon">	
				<a><span class="valign flaticon-phone25"></span>HOTLINES</a>
			</header>
			<div class="container-side-body">
				<ul class="small-icon block">
					<?php if($lgu_data['police_hotline']!=null) { ?><li><span class="flaticon-hat6 valign"></span>Police Station: <?php echo $lgu_data['police_hotline']; ?></li><?php } ?>
					<?php if($lgu_data['fire_hotline']!=null) { ?><li><span class="flaticon-fire34 valign"></span>Fire Station: <?php echo $lgu_data['fire_hotline']; ?></li><?php } ?>
					<?php if($lgu_data['hospital_hotline']!=null) { ?><li><span class="flaticon-hospital15 valign"></span>Hospital: <?php echo $lgu_data['hospital_hotline']; ?></li><?php } ?>
					<?php if($lgu_data['traffic_hotline']!=null) { ?><li><span class="flaticon-school1 valign"></span>Traffic Accidents: <?php echo $lgu_data['traffic_hotline']; ?></li><?php } ?>
					<?php if($lgu_data['disaster_hotline']!=null) { ?><li><span class="flaticon-weather16 valign"></span>Disaster: <?php echo $lgu_data['disaster_hotline']; ?></li><?php } ?>
				</ul>
		  </div>				
		</section>
</aside>