<?php
/* @var $this SiteController */
/* @var $error array */

$this->layout='page';
$this->setPageTitle('Error');
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="error_page">
<h2 class="error_page-code">Error, Your Request is Invalid!</h2>
<div  class="error_page-backButton-cont">
<ul class="button-group round">
<li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>" >Back to Homepage</a></li>
<li><?php echo CHtml::link('Back to Login',array('site/login'), array('class'=>'button')); ?></li>
</ul>
</div>