<?php
/* @var $this PhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='main';
$this->setPageTitle('Photo Management');

?>
<script>
	function viewDetails(id){
		url = "<?php echo Controller::createUrl('photo/UpdatePartial') ?>";
		$.ajax({url:url,data:{id:id, view:'_detailView'}, success:function(result){
			$("#item_view").html(result);
		}});
	}
	function editDetails(id){
		url = "<?php echo Controller::createUrl('photo/UpdatePartial') ?>";
		$.ajax({url:url,data:{id:id, view:'_editView'}, success:function(result){
			$("#item_view").html(result);
		}});
	}
	function listView(){
		$('#thumb_view').addClass('hide');
		$('#list_view').removeClass('hide');
	}
	function thumbnailView(){
		$('#list_view').addClass('hide');
		$('#thumb_view').removeClass('hide');
	}
</script>
<div class="row"  data-equalizer>
<div class="small-4 medium-4 large-4 columns">
<div id="item_view">
 <ul class="pricing-table" data-equalizer-watch>
  <li class="price"><?php if($viewModel==null) { ?><span class="flaticon-landscape2"></span><?php } else { ?><img src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($viewModel->filename); ?>" /><?php } ?></li>  
  <li class="bullet-item"><span class="text-label ">Title </span> <?php if($viewModel!=null) echo $viewModel->title; else echo '-';?></li>
  <li class="description"><span class="text-label ">Filename </span> <?php if($viewModel!=null) echo $viewModel->filename;  else echo '-';?></li>
  <li class="description"><span class="text-label ">Caption </span><?php if($viewModel!=null) echo $viewModel->caption;  else echo '-'; ?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Banner? </span><?php if($viewModel!=null) { if($viewModel->show_banner==1) echo "YES"; else echo "NO"; }  else echo '-'; ?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Gallery? </span><?php if($viewModel!=null) { if($viewModel->show_gallery==1) echo "YES"; else echo "NO"; } else echo '-'; ?></li>
  <li class="cta-button"><?php if($viewModel!=null) { echo CHtml::ajaxButton ("Edit",
															CController::createUrl('photo/UpdatePartial'),
															array('data' => array('id' => $viewModel->photo_id, 'view'=>'_editView'), 'update' => '#item_view'),
															array('class'=>'button expand tiny')); 
													echo CHtml::link('Delete', $this->createUrl('photo/delete', array('id' => $viewModel->photo_id)), 
														array(
														   // for htmlOptions
														   'onclick' => ' {' . CHtml::ajax(array(
																					'type'=>'POST',
																					'url'=>$this->createUrl('photo/delete', array('id' => $viewModel->photo_id)),
																					   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
																					   'success' => "js:function(html){  window.location.reload(true); }")) .
																					   'return false;}', // returning false prevents the default navigation to another url on a new page 
														   'class' => 'button expand tiny',
														   )
													   );
													/*  echo CHtml::ajaxButton ("Edit",
															$this->createUrl('photo/delete', array('id' => $viewModel->photo_id)),//CController::createUrl('photo/Delete'),
															array('data' => array('id' => $viewModel->photo_id), 'type'=>'POST'),
															array('class'=>'button expand tiny')); */
													 // echo CHtml::link("Delete", '#', array('submit'=>array('photo/delete', "id"=>$viewModel->photo_id), 'confirm' => 'Are you sure you want to delete?'));		
													} ?></li>
 </ul>
</div>
</div>
<div class="small-8 medium-8 large-8 columns">
<div class="row"  data-equalizer>
<div class="row">
<ul class="button-group left" style="margin-left:10px;">
<li><?php echo CHtml::link('ADD PHOTO',array('photo/create'), array('class'=>'tiny button')); ?> </li>
</ul>
<ul class="button-group right">
<li><input class="button tiny secondary" type="button" onclick="thumbnailView()" value="THUMBNAIL VIEW"/></li>
<li><input class="button tiny secondary" type="button" onclick="listView()" value="LIST VIEW"/></li>
</ul>
</div>
<div id="thumb_view">
<ul class="medium-block-grid-4 large-block-grid-6">
<?php if($viewModel!=null) { foreach($data as $item){ ?>
<li><a class="th" onclick="viewDetails(<?php echo $item->photo_id;?>)">
	<img src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($item->filename); ?>">
</a></li>
 
 <?php } } ?>
</ul>
</div>
<div id="list_view" class="hide">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
</div>
</div>
</div>

