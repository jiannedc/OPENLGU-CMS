<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	--><!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/css/metro-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/css/metro-bootstrap-responsive.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />	
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/jquery-1.8.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/jquery/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/jquery/jquery.widget.min.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/UI/Metro-UI-CSS/js/metro/metro-*.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="metro">
<div class="page">
	<div class="page-region">
		<div class="page-region-content">
			<div id="top_pane">
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
					<li><a href="#">Notifications</a></li>
				</ul>
			</nav>
			</div>
			<div id="left_pane" class="place-left">
			<nav class="sidebar light">
				<ul>
					<li class="stick bg-cyan"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php"><i class="icon26-home"></i></a></li>
					<li class="stick bg-teal"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=article"><i class="icon26-article"></i></a></li>
					<li class="stick bg-green"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=user"><i class="icon26-user"></i></a></li>
					<li class="stick bg-lime"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=template"><i class="icon26-template"></i></a></li>
					<li class="stick bg-magenta"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=file"><i class="icon26-file"></i></a></li>
					<li class="stick bg-orange"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=feature"><i class="icon26-feature"></i></a></li>
					<li class="stick bg-yellow"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=site/page&view=menu"><i class="icon26-menu"></i></a></li>
				</ul>
			</nav>
			</div>
			<div id="right_pane" class="page place-left border">
				
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>

				<div class="clear"></div>

			</div>
		</div>
	</div>

	<div class="page-footer">
		<div class="page-footer-content">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		</div>
	</div>
</div>

</body>
<script type="text/javascript">
 // Setting size of the div
  /*  $(document).ready(function(){
		adjustSize();         
    });
    $(window).resize(function () {
        adjustSize();
	});

    function adjustSize(){
		var bodyWidth = $(document).width() < 1024 ? 1024 : $(document).width();
		$("#right_pane").width(bodyWidth - $("#left_pane").width() - 15 - 40 - 4);
		
        var bodyHeight = $(document).height() < 650 ? 650 : $(document).height();
		$("#left_pane").height(bodyHeight - $("#top_pane").height() - 2 -  $("#footer").height());
		$("#right_pane").height(bodyHeight - $("#top_pane").height() - 40 - $("#footer").height());
	}
*/
</script>
</html>
</html>
