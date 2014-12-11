<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- blueprint CSS framework >
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/normalize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/foundation.css">
	
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Modern-UI/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon_WebFont2/flaticon.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Icons/Flaticon/flaticon.css">
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/css/metro-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/css/metro-bootstrap-responsive.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />	
	
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup_style.css"/>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/tinybox.js"></script>
	

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/jquery/jquery.widget.min.js"></script>	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/script/js/jquery/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/metro/metro.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/modernizr.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/vendor/jquery.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/foundation.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<?php	$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,);
?>
</head>
<body>
	<div class="row">
		<div class="small-12 large-12 columns">
			<div class="metro border-bottom" id="top_pane">
			<nav class="horizontal-menu place-left">
				<h2>CMS Admin</h2>
			</nav>
			<nav class="horizontal-menu place-right">
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>	
			</nav>
			<nav class="horizontal-menu place-right">
				<ul>
					<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">View Website</a></li>
				</ul>
			</nav>
			</div>
		</div>
	</div>
	<nav class="hide container-topbar">
		<div class="row">
			<div class="small-12 large-12 columns">
			<nav class="top-bar nomargin" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?php echo Yii::app()->request->baseUrl; ?>">CMS Admin</a></h1>
					</li>
				</ul>
			
			<section class="top-bar-section">
			
			<!-- Left Nav Section -->
			<ul class="right">
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><?php echo CHtml::link('Articles',array('article/index')); ?>
					<ul class="dropdown">
						<li><?php echo CHtml::link('Create Article',array('article/create')); ?></li>
						<li><?php echo CHtml::link('Manage Articles',array('article/admin')); ?></li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><?php echo CHtml::link('Users',array('user/index')); ?>
					<ul class="dropdown">
						<li><a href="#">Pending Accounts</a></li>
						<li><a href="#">Manage Users</a></li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
				<li><?php echo CHtml::link('Photos',array('photo/index')); ?></li>
				<li class="divider hide-for-small"></li>
				<li class="has-dropdown"><?php echo CHtml::link('Files',array('file/index')); ?>
					<ul class="dropdown">
						<li><a href="#">Upload File</a></li>
						<li><a href="#">Manage File</a></li>
					</ul>
				</li>
				<li class="divider hide-for-small"></li>
			</ul>
			<!-- Right Nav Section >
			<ul class="right">
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
			</section>
			</nav>
			</div>
		</div>
	</nav>
	<div class="hide container-banner">
	<div class="row">
		<div class="small-12 large-12 columns">
		<div class=" pageTitle">
				<?php echo $this->pageTitle;?>
		</div>	
		</div>
	</div>
	</div>
	<div class="hide container-breadcrumbs">
		<div class="row">
		<div class="small-12 large-12 columns">
			<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'separator' => '',
			)); ?><!-- breadcrumbs -->
			<?php endif?>
		</div>
		</div>
	</div>
	<div class="row metro">
		<div class="small-offset-4 small-8 medium-offset-3 medium-9 large-offset-2 large-10 columns">
			<h2><?php echo $this->pageTitle;?></h2>
		</div>
	</div>
	<div id="content">
	<div id="main" class="row">
		<div class="small-4 medium-3 large-2 columns">
			<div class="metro">
			<nav class="sidebar light">
				<ul>
					<li class="stick bg-cyan"><?php echo CHtml::link('<i class="icon-home"></i>Home',array('site/index')); ?></li>
					<li class="stick bg-teal"><?php echo CHtml::link('<i class="icon-newspaper"></i>Articles',array('article/create')); ?>
						<!--a class="dropdown-toggle" href="#"><i class="icon-newspaper"></i>Articles</a>
						<ul class="dropdown-menu" data-role="dropdown">							
							<li><?php echo CHtml::link('Create Article',array('article/create')); ?></li>
							<li><?php echo CHtml::link('Manage Articles',array('article/admin')); ?></li>
						</ul-->
					</li>
					<li class="stick bg-green"><?php echo CHtml::link('<i class="icon-user"></i>Users',array('user/index')); ?>
						<!--a class="dropdown-toggle" href="#"><i class="icon-user"></i>Users</a>
						<ul class="dropdown-menu" data-role="dropdown">							
							<li><?php echo CHtml::link('Pending Accounts',array('user/index')); ?></li>
							<li><?php echo CHtml::link('Manage Accounts',array('user/admin')); ?></li>
						</ul-->
					</li>
					<li class="stick bg-lime"><?php echo CHtml::link('<i class="icon-file"></i>Files',array('file/create')); ?>
						<!--a class="dropdown-toggle" href="#"><i class="icon-file"></i>Files</a>
						<ul class="dropdown-menu" data-role="dropdown">							
							<li><?php echo CHtml::link('Upload File',array('file/create')); ?></li>
							<li><?php echo CHtml::link('Manage Files',array('file/admin')); ?></li>
						</ul-->
					</li>
					<li class="stick bg-magenta">
						<?php echo CHtml::link('<i class="icon-pictures"></i>Photos',array('photo/index')); ?>
					</li>
					<!--li class="stick bg-orange"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=feature"><i class="icon26-feature"></i>Features</a></li>
					<li class="stick bg-yellow"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=menu"><i class="icon26-menu"></i>Menu</a></li-->
				</ul>
			</nav>
			</div>
		</div>
		<div class="small-8 medium-9 large-10 columns">
		<div class="row">
		<div class="metro small-12 medium-12 large-12 columns">
		<nav class="horizontal-menu compact">
			<?php
				//$items=$this->getItems(1);
				$this->widget('zii.widgets.CMenu', array(
					'encodeLabel' => false,
					'htmlOptions' => array('class' => 'left'),
					'items' => $this->menu,
				));
			?>
		</nav>
		</div>
		</div>
		<div class="row">
		<div class="small-12 medium-12 large-12 columns">		
		<?php echo $content; ?>
		</div>
		</div>
	</div>
	</div><!-- content -->
	</body>
	<script>
		$(document).foundation();
	</script>
	
</html>