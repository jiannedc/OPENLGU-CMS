<?php
/* @var $this FileController */
/* @var $dataProvider CActiveDataProvider */

$this->setPageTitle('File management');
$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Upload File', 'url'=>array('create')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
$data = $dataProvider->getData();
?>
<div class="metro">
<h3>Files</h3>
</div>
<?php if($data!=null){?>
    <table>
		<thead>
		<tr>
			<th width="150">Title</th>
			<th >Description</th>			
			<th width="120">Download Accesss</th>
			<th width="300"></th>
		</tr>
		</thead>
		<tbody>
	<?php
		foreach($data as $file){
	?>
		<tr>
			<td><?php echo $file['title'];?></td>
			<td><?php echo $file['description'];?></td>		
			<td><?php echo $file['download_access'];?></td>		
			<td><ul class="button-group even-2"><li><?php 
				 echo CHtml::link('Edit',array('file/update', 'id'=>$file['file_id']), array( 'class' => 'button tiny')); 
				?></li>
				<li><?php 
				echo CHtml::link('Delete', $this->createUrl('file/delete', array('id' =>  $file['file_id'])), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('file/delete', array('id' =>  $file['file_id'])),
											   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
											   'success' => "js:function(html){  window.location.reload(true); }")) .
											   'return false;}', // returning false prevents the default navigation to another url on a new page 
				   'class' => 'button tiny',
				   )
			   );
			   ?></li>
			   <li><?php 
				echo CHtml::link('Download', $this->createUrl('site/download', array('filename' =>  $file['file_location'])), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('site/download', array('filename' =>  $file['file_location'])))),
				   'class' => 'button tiny',
				   )
			   );
			   ?></li>
			   <li><?php 
				echo CHtml::link('Preview', Yii::app()->request->baseUrl.'/uploads/'.$file['file_location'], array( 'class' => 'button tiny',));
			   ?></li>
			   </ul>
			</td>
		</tr>
	<?php
	}
	?>
		</tbody>
	</table>
	<?php
	}else{
	
		echo "<h3 class=\"subheader\">No Files Uploaded.</h3>";
	}
	?>
  </div>