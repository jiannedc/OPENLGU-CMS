
 <ul class="pricing-table" data-equalizer-watch>
  <li class="price"><!--span class="flaticon-landscape2"></span--><img src="<?php echo Yii::app()->request->baseUrl.'/images/'. CHtml::encode($model->filename); ?>" /></li>  
  <li class="bullet-item"><span class="text-label ">Title </span> <?php echo $model->title;?></li>
  <li class="description"><span class="text-label ">Filename </span> <?php echo $model->filename;?></li>
  <li class="description"><span class="text-label ">Caption </span><?php echo $model->caption;?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Banner? </span><?php if($model->show_banner==1) echo "YES"; else echo "NO";?></li>
  <li class="bullet-item"><span class="text-label ">Shown in Gallery? </span><?php if($model->show_gallery==1) echo "YES"; else echo "NO";?></li>
  <li class="cta-button"><input class="button expand tiny" type="button" onclick="editDetails(<?php echo $model->photo_id?>)" value="EDIT"/>
  <?php echo CHtml::link('Delete', $this->createUrl('photo/delete', array('id' => $model->photo_id)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('photo/delete', array('id' => $model->photo_id)),
										   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
										   'success' => "js:function(html){ window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button expand tiny',
			   )
			);?>
  </li>
</ul>