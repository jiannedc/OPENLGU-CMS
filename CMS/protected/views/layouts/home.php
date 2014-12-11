<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/normalize.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/foundation.css">

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon/flaticon.css">

	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup_style.css"/>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/tinybox.js"></script>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/modernizr.js"></script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
	<?php
	if(!Yii::app()->user->isGuest){
		if(Yii::app()->user->isAdmin()){
		?>
			<div id="admin-bar" class="row">
			<div class="small-12 large-12 columns">
			<a class="right button tiny admin-button" href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php">Go to Admin</a>
			</div>
			</div>
	<?php	
		}
	
	}

	$lgu_data = Yii::app()->db->createCommand()
		->select()
		->from('lgu_data')
		->where('active=:active', array(':active'=>'TRUE'))
		->queryRow();
	
	?>
	<nav class="container-topbar">
		<div class="row">
			<div class="small-12 large-12 columns">
			<nav class="top-bar nomargin" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gov/govph-seal.png" /></a></h1>
					</li>
					<li class="toggle-topbar"><a href="#"></a></li>
				</ul>
			<section class="top-bar-section">
			
			<?php
				$items=$this->getItems(1);
				$menu = array(
					'encodeLabel' => false,
					'htmlOptions'=>array('class'=>'left'),
					'items'=>$items
				);				
				$this->widget('zii.widgets.CMenu', $menu);
				
				$this->widget('zii.widgets.CMenu', array(
					'encodeLabel' => false,
					'htmlOptions' => array('class' => 'right'),
					'items' => array(
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
						array('label' => 'Contact Us', 'url'=>array('/site/contact')),
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
						array('label'=>'
							<form role="search" method="get" action="">
								<input type="search" name="q" value="" class="search-field" placeholder="Search …" title="Search for:">
							</form>', 'itemOptions' => array('class' => 'search')),
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					),
				));
			?>
			</section>
			</nav>
			</div>
		</div>
	</nav>

	<div class="container-masthead" style="background-color:#<?php echo $lgu_data['masthead_color']; ?>">
	<div class="row">
		<div class="small-12 large-12 columns">
			<div class="clearfix">
				<div class="container-logo"><?php if($lgu_data['logo_location']==null) { ?><span class="flaticon-landscape2"></span><?php } else { ?><img class="agency-logo" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$lgu_data['logo_location']; ?>" /><?php } ?></div>
				<div class="container-name">
					<div class="republic">REPUBLIC OF THE PHILIPPINES</div>
					<div class="agency-name"><?php echo $lgu_data['agency_name']; ?></div>
					<div class="tagline"><?php echo $lgu_data['tagline']; ?></div>
				</div>
			</div>			
		</div>
	</div>
	</div>
	<div class="hide-for-small container-banner" style="background-color:#<?php echo $lgu_data['banner_color']; ?>">
	<?php $this->renderPartial('//layouts/_banner', array('isHome'=>true))?>
	</div>
	<nav class="container-topbar">
	<div class="row">
		<div class="small-12 large-12 columns">
		<nav class="top-bar nomargin" data-topbar>
			<ul class="title-area">
				<li class="name">
					
				</li>
				<li class="toggle-topbar"><a href="#"></a></li>
			</ul>
		<section class="top-bar-section">
			<?php
				$items=$this->getItems(2);
				$menu = array(
					'encodeLabel' => false,
					'htmlOptions'=>array('class'=>'left'),
					'items'=>$items
				);				
				$this->widget('zii.widgets.CMenu', $menu);
				
				$this->widget('zii.widgets.CMenu', array(
					'encodeLabel' => false,
					'htmlOptions' => array('class' => 'right'),
					'items' => array(
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
						array('label' => 'SignUp', 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					),
				));
			?>
			
		</section>
		</nav>
		</div>
	</div>
	</nav>		

	<div class="container-breadcrumbs">
		<div class="row">
		<div class="small-12 large-12 columns">
			<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?>
			<?php endif?>
		</div>
		</div>
	</div>

	
	<div class="container-main">
	<div id="main" class="row">
	<?php	echo $content; ?>
	</div>
	</div>
	
	<div class="container-footer">
	<div class="row">
    <div class="large-3 columns widget-area">
		<div class="social-media section">
			<header>Social Media</header>
			<div class="body small-icon">
			<a href="<?php echo $lgu_data['facebook_link']; ?>" target="_blank"> <span class="flaticon-facebook45 valign"></span>Like us on Facebook</a><br />
			<a href="<?php echo $lgu_data['facebook_link']; ?>" target="_blank"> <span class="flaticon-twitter39 valign"></span>Follow us on Twitter</a>
			</div>
		</div>
		<div class="visit-us section">
			<header>Visit Us</header>
			<div class="body">
			<?php echo $lgu_data['address']; ?>
			</div>
		</div>
	</div>
	<div class="large-3 columns widget-area ">	
		<div class="contact-us section">
			<header>Contact Us</header>
			<div class="body small-icon">
			<span class="valign flaticon-phone60"></span>Contact No.: <?php echo $lgu_data['contact_no']; ?><br />
			<span class="valign flaticon-office"></span>Fax Number: <?php echo $lgu_data['fax_no']; ?><br />
			<span class="valign flaticon-envelope43"></span>Email: <?php echo $lgu_data['email_address']; ?>
			</div>
		</div>
		<div class="contact-us section">
			<header>Account Access</header>
			<div class="body small-icon">
			<span class="valign flaticon-login17"></span><?php if(Yii::app()->user->isGuest){ echo "<a href='index.php?r=site/login'>Log in User Account</a>"; }else { echo "<a href='index.php?r=site/logout'>Log out (".Yii::app()->user->first_name.")</a>"; } ?><br />
			<?php if(Yii::app()->user->isGuest){ echo "<span class='valign flaticon-create1'></span><a href='index.php?r=site/signup'>Sign Up</a>"; } ?>
			</div>
		</div>
		<div class="attribution section">
		<header>Attribution</header>
		<div class="atrrib">
		Icons made by Freepik from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>
		</div>
		</div>
	</div>
    <div class="large-6 columns widget-area">
		<div class="disclaimer">
			<div>
			<?php if($lgu_data['logo_location']==null) { ?><span class="flaticon-landscape2"></span><?php } else { ?><img class="lgu-seal-footer" width="150" height="150" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$lgu_data['logo_location']; ?>" /><?php } ?>
			<p class="text-center">
			<?php echo $lgu_data['disclaimer']; ?></br>
			
			</p>
			</div>
		</div>
		<div class="copyright">
			<p class="text-center"><strong><?php echo $lgu_data['copyright']; ?></strong></p>
		</div>
	</div>
	</div>
	</div>

	<div class="container-footer-govph">
	<div class="row">
	<div class="small-12 large-4 large-offset-2 columns right widget-area">
		<article class="widget">
		<div class="footer-section">
			<div>
			<img class="seal-mono" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gov/govph-seal-footer.png" alt="Seal of the Republic of the Philippines - Monochromatic" title="Seal of the Republic of the Philippines - Monochromatic" width="280" height="280">
			<p style="text-align:center;">All content is public domain unless otherwise stated.</p>
			</div>
		</div>
		</article>
	</div>
	
	<div class="small-12 large-6 columns left">
	<div class="small-12 large-6 columns widget-area">
	<article class="widget">
	<div class="footer-section">
	<h6><strong>Republic of the Philippines</strong></h6>
	<div class="menu-national-government-portal-container">
		<ul id="menu-national-government-portal" class="menu">
			<li><a href="http://www.gov.ph/">Official Gazette</a></li>
			<li><a href="http://president.gov.ph/">Office of the President</a></li>
			<li><a href="http://www.gov.ph/directory/">Official Directory</a></li>
			<li><a href="http://www.gov.ph/calendar/">Official Calendar</a></li>
		</ul>
	</div>
	</div>
	</article>
	<article class="widget">
		<div class="footer-section">
		<h6><strong>Resources</strong></h6>
		<div class="menu-links-resources-container">
			<ul id="menu-links-resources" class="menu">
				<li><a href="http://noah.dost.gov.ph/">Project NOAH</a></li>
			</ul>
		</div>
		</div>
	</article>
	</div>

	<div class="small-12 large-6 columns widget-area">
    <article class="widget widget_nav_menu">
		<div class="footer-section">
			<h6><strong>Executive</strong></h6>
			<div class="menu-links-executive-container">
				<ul id="menu-links-executive" class="menu">
					<li><a href="http://www.president.gov.ph/">Office of the President</a></li>
					<li><a href="http://www.ovp.gov.ph/">Office of the Vice President</a></li>
					<li><a href="http://www.deped.gov.ph/">Department of Education</a></li>
					<li><a href="http://www.dilg.gov.ph/">Department of Interior and Local Government</a></li>
					<li><a href="http://www.dof.gov.ph/">Department of Finance</a></li>
					<li><a href="http://www.doh.gov.ph/">Department of Health</a></li>
					<li><a href="http://www.dost.gov.ph/">Department of Science and Technology</a></li>
					<li><a href="http://www.dti.gov.ph/">Department of Trade and Industry</a></li>
				</ul>
			</div>
		</div>
	</article>
	<article class="widget widget_nav_menu">
		<div class="footer-section">
			<h6><strong>Legislative</strong></h6>
			<div class="menu-links-legislative-container">
				<ul id="menu-links-legislative" class="menu">
					<li><a href="http://www.senate.gov.ph/">Senate of the Philippines</a></li>
					<li><a href="http://www.congress.gov.ph/">House of Representatives</a></li>
				</ul>
			</div>
		</div>
	</article>
	<article class="widget widget_nav_menu">
		<div class="footer-section">
			<h6><strong>Judiciary</strong></h6>
			<div class="menu-links-judiciary-container">
				<ul id="menu-links-judiciary" class="menu">
					<li><a href="http://sc.judiciary.gov.ph/">Supreme Court</a></li>
					<li><a href="http://ca.judiciary.gov.ph/">Court of Appeals</a></li>
					<li><a href="http://sb.judiciary.gov.ph/">Sandiganbayan</a></li>
					<li><a href="http://cta.judiciary.gov.ph/">Court of Tax Appeals</a></li>
					<li><a href="http://jbc.judiciary.gov.ph/">Judicial Bar and Council</a></li>
				</ul>
			</div>
		</div>
	</article>
	</div>
	</div>
	</div>
	</div>
</body>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/jquery.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/foundation.min.js"></script>
	<script>
	$(document).foundation();
	</script>
	
</html>