<?php
/* @var $this ArticleController */
/* @var $model Article */
$this->layout='main';
$this->setPageTitle('Photo Management');
?>
<div class="fieldset-container">
<div class="row">
<div class="small-12 large-12 columns">
<fieldset>		
<legend>Add Photo</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
</div>
</div>
</div>	