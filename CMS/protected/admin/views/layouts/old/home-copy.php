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
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/normalize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/foundation.css">
	
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Modern-UI/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont2/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon/flaticon.css">
    	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/modernizr.js"></script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

	<nav class="container-topbar">
		<div class="row">
			<div class="small-12 large-12 columns">
			<nav class="top-bar nomargin" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/seal-govph.png" /></a></h1>
					</li>
					<li class="toggle-topbar"><a href="#"></a></li>
				</ul>
			<section class="top-bar-section">
			
			<!-- Left Nav Section -->
			<!--ul class="left">
				<li class="divider hide-for-small"></li>
				<li><a href="#">Home</a></li>
				<li class="divider hide-for-small"></li>
				<li><a href="#">Transparency</a></li>
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><a href="#">Products and Services</a>
					<ul class="dropdown">
						<li class="has-dropdown"><a href="#">Products</a>
							<ul class="dropdown">
								<li><a href="#">Product 1</a></li>
								<li><a href="#">Product 2</a></li>
								<li><a href="#">Product 3</a></li>
							</ul>
						</li>
						<li class="has-dropdown"><a href="#">Services</a>
							<ul class="dropdown">
								<li><a href="#">Services 1</a></li>
								<li><a href="#">Services 2</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
			</ul-->
			<!-- Right Nav Section -->
			<!--ul class="right">
				<li class="divider hide-for-small hide-for-medium"></li>				
				<li><a href="#">Contact Us</a></li>
				<li class="divider hide-for-medium hide-for-small"></li>
				<li class="search">
					<form role="search" method="get" action="">
						<input type="search" class="search-field" placeholder="Search …" value="" title="Search for:">
					</form>
				</li>
				<li class="divider hide-for-medium hide-for-small"></li>
			</ul-->
			<?php
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'htmlOptions' => array('class' => 'left'),
				'items' => array(
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array(
						'label' => 'Home',
						'url' => array('/site/index'),
						'submenuOptions' => array('class' => 'dropdown'), //ul class
						'itemOptions' => array('class' => 'has-dropdown'), //each li class					
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'), //link <a> class
						'items' => array(
							array(
								'label' => 'Services',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Map and Location',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'About LGU',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'History',
										'url' => array('/site/page', 'view'=>'history'),
									),
									array(
										'label' => 'Mission & Vission',
										'url' => array('/site/page', 'view'=>'mission_vission'),
									),
									array(
										'label' => 'Local Officials',
										'url' => array('/site/page', 'view'=>'officials'),
									),
									array('label'=>'Add Submenu','url'=>array('controller/action'),
										'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->user_type =="Admin")
									),
								)
							),
							array(
								'label' => 'Directory',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Local Government Offices',
										'url' => array('/site/page', 'view'=>'offices'),
									),
									array(
										'label' => 'Hospitals & Clinics',
										'url' => array('/site/page', 'view'=>'hospitals_clinics'),
									),
									array(
										'label' => 'Schools',
										'url' => array('/site/page', 'view'=>'schools'),
									),
									array(
										'label' => 'Police and Fire Stations',
										'url' => array('/site/page', 'view'=>'police_fire_stations'),
									),
									array(
										'label' => 'Hotels and Restaurants',
										'url' => array('/site/page', 'view'=>'hotel_restaurants'),
									),
									array(
										'label' => 'Malls & Amusement Centers',
										'url' => array('/site/page', 'view'=>'malls_amusement'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->user_type =="Admin")
									),
								)
							),
							array(
								'label' => 'News and Events',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Announcements',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Publications',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Forums',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->user_type =="Admin")
							),							
						),
					),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array('label'=>'Transparency', 'url'=>array('/site/transparency')),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array('label'=>'Products and Services', 'url'=>array('/site/products_services'), 'itemOptions' => array('class' => 'has-dropdown'), 'submenuOptions' => array('class' => 'dropdown'),
						'items' => array(
							array('label' => 'Products', 'url'=>array('/site/products'), 'itemOptions' => array('class' => 'has-dropdown'), 'submenuOptions' => array('class' => 'dropdown'),
								'items' => array(
												array('label'=>'Products1', 'url'=>array('site/product1')),
												array('label'=>'Products2', 'url'=>array('site/product2'))
								),
							),
							array('label' => 'Services', 'url'=>array('/site/services'), 'itemOptions' => array('class' => 'has-dropdown'), 'submenuOptions' => array('class' => 'dropdown'),
								'items' => array(
												array('label'=>'Services1', 'url'=>array('site/service1')),
												array('label'=>'Services2', 'url'=>array('site/services2'))
								),
							),
						),
					),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
				),
			));
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'htmlOptions' => array('class' => 'right'),
				'items' => array(
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array('label' => 'Contact Us', 'url'=>array('/site/page', 'view'=>'contact')),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array('label'=>'<form role="search" method="get" action="">
						<input type="search" class="search-field" placeholder="Search …" value="" title="Search for:">
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

	<div class="container-masthead">
	<div class="row">
		<header class="small-12 large-12 columns">
			<div class="clearfix">
				<div class="left container-logo"><a href="#"><img class="agency-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-masthead.png"/></a></div>
				<div class="left container-name">
					<div class="republic">REPUBLIC OF THE PHILIPPINES</div>
					<div class="agency-name">Official Website of the City of Calamba</div>
					<div class="tagline">The Premier City of Growth, of Leisure and of National Pride</div>
				</div>
			</div>			
		</header>
	</div>
	</div>
	
	<?php $this->renderPartial('_banner')?>
	
	<?php $this->renderPartial('_lguMenu'); ?>
	<!--nav class="container-topbar">
		<div class="row">
			<div class="small-12 large-12 columns">
			<nav class="top-bar nomargin" data-topbar>
				<ul class="title-area">
					<li class="name"></li>
					<li class="toggle-topbar"><a href="#"></a></li>
				</ul>
			<section class="top-bar-section">
			<ul class="left">
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><a href="#">For Residents</a>
					<ul class="dropdown">
						<li><a href="#">Services</a></li>
						<li class="has-dropdown"><a href="#">About LGU</a>
							<ul class="dropdown">
								<li><a href="#">History</a></li>
								<li><a href="#">Mission & Vission</a></li>
								<li><a href="#">Local Officials</a></li>
							</ul>
						</li>
						<li><a href="#">Directory</a></li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><a href="#">For Visitors</a>
						<ul class="dropdown">
						<li><a href="#">Local Heritage</a></li>
						<li><a href="#">Map & Location</a></li>
						<li><a href="#">Directory</a></li>
						<li><a href="#">News & Events</a></li>
						<li class="has-dropdown"><a href="#">Tourist Information</a>
							<ul class="dropdown">
								<li><a href="#">Local Attraction</a></li>
								<li><a href="#">Festivals</a></li>
								<li><a href="#">Accomodation</a></li>
							</ul>
						</li>
						<li class="has-dropdown"><a href="#">Travel Information</a>
							<ul class="dropdown">
								<li><a href="#">How To Get Here</a></li>
								<li><a href="#">Moving Around</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><a href="#">For Businesses</a>
					<ul class="dropdown">
					<li><a href="#">First link in dropdown</a></li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
			</ul>			
			</section>
			</nav>
			</div>
		</div>
	</nav-->
	
	<div class="hide container-breadcrumbs">
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
<nav class="container-topbar">
		<div class="row">
			<div class="small-12 large-12 columns">
			<nav class="top-bar nomargin" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/seal-govph.png" /></a></h1>
					</li>
					<li class="toggle-topbar"><a href="#"></a></li>
				</ul>
			<section class="top-bar-section">	
	<?php
	
	$items=$this->getItems(1);
$menu = array(
  'id' => 'top-bar-menu',
  'activeCssClass'=>'selected',
  'linkLabelWrapper'=>null, 
  'htmlOptions'=>array('class'=>'left'),
  'items'=>$items
);
$this->widget('zii.widgets.CMenu', $menu);
	
	
	?>
		</section>
			</nav>
			</div>
		</div>
	</nav>
	<?php
	echo $content; ?>
	</div>
	
	<div class="container-footer">
	<div class="row">
    <div class="large-3 columns widget-area">
		<div class="social-media section">
			<header>Social Media</header>
			<div class="body small-icon">
			<a href="#" target="_blank"> <span class="flaticon-facebook24 valign"></span>Like us on Facebook</a><br />
			<a href="#" target="_blank"> <span class="flaticon-social19 valign"></span>Follow us on Twitter</a>
			</div>
		</div>
		<div class="visit-us section">
			<header>Visit Us</header>
			<div class="body">City Government of Zamboanga<br />
			City Hall<br />
			N.S. Valderroza Street<br />
			7000 Zamboanga City <br />
			</div>
		</div>
	</div>
	<div class="large-3 columns widget-area ">	
		<div class="contact-us section">
			<header>Contact Us</header>
			<div class="body small-icon">
			<span class="valign flaticon-phone25"></span>Contact No.: (062) 991-4526 <br />
			<span class="valign flaticon-office"></span>Fax Number: (062) 991-1889<br />
			<span class="valign flaticon-email29"></span>Email: mayor@zamboanga.gov.ph
			</div>
		</div>
		<div class="contact-us section">
			<header>Account Access</header>
			<div class="body small-icon">
			<span class="valign flaticon-people15"></span><?php if(Yii::app()->user->isGuest){ echo "<a href='index.php?r=site/login'>Log in User Account</a>"; }else { echo "<a href='index.php?r=site/logout'>Log out (".Yii::app()->user->first_name.")</a>"; } ?><br />
			<span class="valign flaticon-draw12"></span><?php if(Yii::app()->user->isGuest){ echo "<a href='index.php?r=site/signup'>Sign Up</a>"; } ?>
			</div>
		</div>
	</div>
    <div class="large-6 columns widget-area">
		<div class="disclaimer">
			<div>
			<img class="lgu-seal-footer" src="<?php echo Yii::app()->request->baseUrl; ?>/images/seal.png" width="150" height="150">
			<p class="text-center">The City of XXX shall not be responsible for any errors or omissions contained 
in this site. It reserves the right to make changes without notice. Accordingly, all information is provided "as is". It provides no warranty, either express or 
implied, as to  the accuracy, reliability, or completeness of furnished data. If you find any errors or omissions, we encourage you to report them to the webmaster.</p>
			</div>
		</div>
		<div class="copyright">
			<p class="text-center"><strong>Copyright © City of XXXX, 2014</strong></p>
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
			<img class="seal-mono" src="<?php echo Yii::app()->request->baseUrl; ?>/images/govph-seal-top-bar.png" alt="Seal of the Republic of the Philippines - Monochromatic" title="Seal of the Republic of the Philippines - Monochromatic" width="280" height="280">
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