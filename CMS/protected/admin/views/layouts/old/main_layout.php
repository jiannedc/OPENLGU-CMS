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
	
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont2/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon/flaticon.css">
    	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
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
		
		<?php
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'htmlOptions' => array('class' => 'left'),
				'items' => array(
					array(
						'label' => 'Home',
						'url' => array('/site/index'),
					),
					array('label' => '<li class="divider hide-for-small"></li>', 'url' => '#',),
					array(
						'label' => 'For Residents',
						'url' => '#',
						'submenuOptions' => array('class' => 'dropdown'),
						'items' => array(
							array(
								'label' => 'Submenu Item 1',
								'url' => array('/user/create'),
							),
							array(
								'label' => 'Submenu Item 1',
								'url' => array('/user/list'),
							),
						),
						'itemOptions' => array('class' => 'has-dropdown'),
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
					),
					array('label'=>'Logs','url'=>array('actionLogs/admin'),'icon'=>'wrench white',
						'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->name=="admin")),
					),
			));

		
		/* $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label' => 'For Residents', 'url' => '#',
						'submenuOptions' => array( 'class' => 'dropdown' ),
						'items' => array(
									array('label' => 'Services', 'url' => array( '/site/services'),),
									array('label' => 'Submenu Item 1', 'url' => array( '/user/list' ),),
									),
				'itemOptions' => array( 'class' => 'has-dropdown' ),
				//'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),
				)),
				'htmlOptions' => array( 'class' => 'nav' ),
				'encodeLabel' => false,
				
				/*	<ul class="dropdown">
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
				array('label'=>'For Residents', 'url'=>array('/site/index')),
				
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'SignUp', 'url'=>array('site/signup')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				),
			
		)); */?>
		
		</section>
			</nav>
			</div>
		</div>
	</nav>
		
	<!--/div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->



</body>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/jquery.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/foundation.min.js"></script>
	<script>
		$(document).foundation();
	</script>
</html>
