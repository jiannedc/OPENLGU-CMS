<?php
/* @var $this LguDataController */
/* @var $data LguData */
?>
<li>
	<article class="entry-block">
	<header class="entry-header">
	<div class="row">
		<ul class="button-group">
			<?php
			echo "<li>".CHtml::link('<i class=foundicon-edit></i>EDIT', $this->createUrl('lgudata/update', array('id' => $data->id)), 
				array(
				   'class' => 'button tiny',
				   )
			   )."</li>";
			echo "<li>".CHtml::link('<i class=foundicon-trash></i>DELETE', $this->createUrl('lgudata/delete', array('id' => $data->id)), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
									'type'=>'POST',
									'url'=>$this->createUrl('lgudata/delete', array('id' => $data->id)),
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
	<div class="container-masthead" style="background-color:#<?php echo $data->masthead_color; ?>">
	<div class="row">
		<div class="small-12 large-12 columns">
			<div class="clearfix">
				<div class="container-logo"><?php if($data->logo_location==null) { ?><span class="flaticon-landscape2"></span><?php } else { ?><img class="agency-logo" src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($data->logo_location); ?>" /><?php } ?></div>
				<div class="container-name">
					<div class="republic">REPUBLIC OF THE PHILIPPINES</div>
					<div class="agency-name"><?php echo CHtml::encode($data->agency_name); ?></div>
					<div class="tagline"><?php echo CHtml::encode($data->tagline); ?></div>
				</div>
			</div>			
		</div>
	</div>
	</div>
	<div class="container-banner" style="background-color:#<?php echo $data->banner_color; ?>">
	<?php $this->renderPartial('//layouts/_banner', array('isHome'=>true))?>
	</div>
	<div class="row">
	<aside class="small-12 medium-4 medium-offset-8 large-4 large-offset-8 columns">
		<section id="container-hotlines" class="container-side">
			  <header class="container-side-header medium-icon">	
				<a><span class="valign flaticon-phone25"></span>HOTLINES</a>
			</header>
			<div class="container-side-body">
				<ul class="small-icon block">
					<?php if($data->police_hotline!=null) { ?><li><span class="flaticon-police18 valign"></span>Police Station: <?php echo CHtml::encode($data->police_hotline); ?></li><?php } ?>
					<?php if($data->fire_hotline!=null) { ?><li><span class="flaticon-flames valign"></span>Fire Station: <?php echo CHtml::encode($data->fire_hotline); ?></li><?php } ?>
					<?php if($data->hospital_hotline!=null) { ?><li><span class="flaticon-hospital1 valign"></span>Hospital: <?php echo CHtml::encode($data->hospital_hotline); ?></li><?php } ?>
					<?php if($data->traffic_hotline!=null) { ?><li><span class="flaticon-school1 valign"></span>Traffic Accidents: <?php echo CHtml::encode($data->traffic_hotline); ?></li><?php } ?>
					<?php if($data->disaster_hotline!=null) { ?><li><span class="flaticon-weather16 valign"></span>Disaster: <?php echo CHtml::encode($data->disaster_hotline); ?></li><?php } ?>		
				</ul>
		  </div>				
		</section>
	</aside>
	</div>
	<div class="container-footer">
	<div class="row">
	<div class="large-3 columns widget-area">
		<div class="social-media section">
			<header>Social Media</header>
			<div class="body small-icon">
			<a href="<?php echo CHtml::encode($data->facebook_link); ?>" target="_blank"> <span class="flaticon-facebook24 valign"></span>Like us on Facebook</a><br />
			<a href="<?php echo CHtml::encode($data->twitter_link); ?>" target="_blank"> <span class="flaticon-social19 valign"></span>Follow us on Twitter</a>
			</div>
		</div>
		<div class="visit-us section">
			<header>Visit Us</header>
			<div class="body">
			<?php echo $data->address; ?>
			</div>
		</div>
	</div>
	<div class="large-3 columns widget-area ">	
		<div class="contact-us section">
			<header>Contact Us</header>
			<div class="body small-icon">
			<span class="valign flaticon-phone25"></span>Contact No.: <?php echo CHtml::encode($data->contact_no); ?><br />
			<span class="valign flaticon-office"></span>Fax Number: <?php echo CHtml::encode($data->fax_no); ?><br />
			<span class="valign flaticon-email29"></span>Email: <?php echo CHtml::encode($data->email_address); ?>
			</div>
		</div>
		<div class="contact-us section">
			<header>Account Access</header>
			<div class="body small-icon">
			<span class="valign flaticon-users6"></span><?php if(Yii::app()->user->isGuest){ echo "<a href='index.php?r=site/login'>Log in User Account</a>"; }else { echo "<a href='index.php?r=site/logout'>Log out (".Yii::app()->user->first_name.")</a>"; } ?><br />
			<?php if(Yii::app()->user->isGuest){ echo "<span class='valign flaticon-users6'></span><a href='index.php?r=site/signup'>Sign Up</a>"; } ?>
			</div>
		</div>
	</div>
	<div class="large-6 columns widget-area">
		<div class="disclaimer">
			<div>
			<?php if($data->logo_location==null) { ?><span class="flaticon-landscape2"></span><?php } else { ?><img class="lgu-seal-footer" width="150" height="150" src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($data->logo_location); ?>" /><?php } ?>
			
			<p class="text-center">
				<?php echo CHtml::encode($data->disclaimer); ?>
			</p>
			</div>
		</div>
		<div class="copyright">
			<p class="text-center"><strong><?php echo CHtml::encode($data->copyright); ?></strong></p>
		</div>
	</div>
	</div>
	</div>
	</article>
</li>