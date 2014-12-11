<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */
$this->layout='main';
$this->setPageTitle("Home");
?>
<div class="metro">

	<a class="tile double bg-crimson" href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=file/index">
		<div class="tile-content icon">
			<i class="icon-download-2"></i>
		</div>
		<div class="tile-status">
			<span class="name">Manage Downloadable Files</span>
		</div>
	</a>	
	<a class="tile bg-orange">
		<div class="tile-content icon">
			<i class="icon-window"></i>
		</div>
		<div class="tile-status">
			<span class="name">
				Manage Homepage
			</span>
		</div>
	</a>
	<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=article/create" class="tile double-vertical bg-cyan">
		<div class="tile-content icon">
			<i class="icon-newspaper"></i>
		</div>
		
		<div class="tile-status">
			<span class="name">
				Create Article
			</span>
		</div>
	</a>
	
	<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=photo/index" class="tile double bg-lime">
		<div class="tile-content icon">
			<i class="icon-pictures"></i>
		</div>
		<div class="tile-status">
			<span class="name">
				Add/Upload Photos to Gallery
			</span>
		</div>
	</a>
	<a class="tile double bg-darkIndigo">
		<div class="tile-content icon">
			<i class="icon-calendar"></i>
		</div>
		<div class="tile-status">
			<span class="name">
				Manage 	Events and Headline
			</span>
		</div>
	</a>
		
	
</div>
<div class="tile-group double">
	<!--div class="tile-group-title">Notifications</div-->
	
	<!--a class="tile bg-emerald">
		<div class="tile-content icon">
			<i class="icon-stats-up"></i>
		</div>
		<div class="tile-status">
			<span class="name">
				Polls and Surveys
			</span>
		</div>
	</a>
	<a class="tile bg-teal">
		<div class="tile-content icon">
			<i class="icon-comments-5"></i>
		</div>
		<div class="tile-status">
			<span class="name">Feedback Form Results</span>
		</div>
	</a>
	<a class="tile bg-red">
		<div class="tile-content icon">
			<i class="icon-warning"></i>
		</div>
		<div class="brand">
			<span class="name fg-white">Reminders</span>
			<span class="badge bg-orange">12</span>
		</div>
	</a-->
</div>
<div class="tile-group double">
	<div class="tile-group-title">Notifications</div>
	<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php?r=user/pending" class="tile bg-lightGreen">
		<div class="tile-content icon">
			<i class="icon-user"></i>
		</div>
		<div class="brand">
			<span class="name fg-white">Pending Request</span>
			<span class="badge bg-orange"></span>
		</div>
	</a>
	<a class="tile bg-cyan">
		<div class="tile-content icon">
			<i class="icon-mail"></i>
		</div>
		<div class="brand">
			<span class="name fg-white">Messages</span>
			<span class="badge bg-orange">12</span>
		</div>
	</a>
	<!--a class="tile bg-red">
		<div class="tile-content icon">
			<i class="icon-warning"></i>
		</div>
		<div class="brand">
			<span class="name fg-white">Reminders</span>
			<span class="badge bg-orange">12</span>
		</div>
	</a-->
</div>
</div>