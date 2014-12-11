<?php
/* @var $this MessagesController */
/* @var $dataProvider CActiveDataProvider */
$this->layout="main";
$this->setPageTitle('Messages Management');
$this->breadcrumbs=array(
	'Messages',
);
?>

<div class="metro">
<h3>Messages</h3>
</div>

<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel-1">Unread Messages</a></dd>
  <dd class="active"><a href="#panel-2">Read Messages</a></dd>
  <dd><a href="#panel-3">All Messages</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel-1">
<?php if($unread_messages!=null){?>
<table class="hovered">
	<thead>
    <tr>
		<th>From:</th>
		<th width="150">Subject</th>
		<th>Body</th>
		<th width="190"></th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach($unread_messages as $message){
?>
    <tr>
		<td><?php echo $message['name'];?><br /><?php echo $message['email_address'];?></td>
		<td><?php echo $message['subject'];?></td>
		<td>
		<?php  
			$message_preview = strip_tags($message['body']);
			
			if (strlen($message_preview) > 250) {
				$temp = substr($message_preview, 0, 250);
				$message_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='admin.php?r=messages/view&id=".$message['id']."' class='read-more'>Read more</a>";
			}
			echo $message_preview;
		?>
		</td>
		<td><ul class="button-group">
			<li><?php 
			echo CHtml::link('View', $this->createUrl('messages/view', array('id' =>  $message['id'])), 
			array('class' => 'button tiny',));?>
			</li>
			<li><?php 
			echo CHtml::link('Delete', $this->createUrl('messages/delete', array('id' =>  $message['id'])), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('messages/delete', array('id' =>  $message['id'])),
										   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );
		   ?></li>
		   <li><?php 
			echo CHtml::link('Mark As Read', $this->createUrl('messages/markAsRead', array('id' =>  $message['id'], 'mark'=>TRUE)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('messages/markAsRead', array('id' =>  $message['id'], 'mark'=>TRUE)),
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );?>
		   </li>
		   </ul>
		</td>
    </tr>
<?php
}
?>
	</tbody>
</table>
<?php
}
else{
	
		echo "<h3 class=\"subheader\">No Unread Messages.</h3>";
	}
?>
</div>
<div class="content" id="panel-2">
<?php if($read_messages!=null){?>
<table class="hovered">
	<thead>
    <tr>
		<th>From:</th>
		<th width="150">Subject</th>
		<th>Body</th>
		<th width="190"></th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach($read_messages as $message2){
?>
    <tr>
		<td><?php echo $message2['name'];?><br /><?php echo $message2['email_address'];?></td>
		<td><?php echo $message2['subject'];?></td>
		<td>
		<?php  
			$message_preview = strip_tags($message2['body']);
			
			if (strlen($message_preview) > 250) {
				$temp = substr($message_preview, 0, 250);
				$message_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='admin.php?r=messages/view&id=".$message2['id']."' class='read-more'>Read more</a>";
			}
			echo $message_preview;
		?>
		</td>
		<td><ul class="button-group">
			<li><?php 
			echo CHtml::link('View', $this->createUrl('messages/view', array('id' =>  $message2['id'])), 
			array('class' => 'button tiny',));?>
			</li>
			<li><?php 
			echo CHtml::link('Delete', $this->createUrl('messages/delete', array('id' =>  $message2['id'])), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('messages/delete', array('id' =>  $message2['id'])),
										   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );
		   ?></li>
		   <li><?php 
			echo CHtml::link('Mark As Unread', $this->createUrl('messages/markAsRead', array('id' =>  $message2['id'], 'mark'=>FALSE)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('messages/markAsRead', array('id' =>  $message2['id'], 'mark'=>FALSE)),
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );?>
		   </li>
		   </ul>
		</td>
    </tr>
<?php
}
?>
	</tbody>
</table>
<?php
}
else{
	
		echo "<h3 class=\"subheader\">No Messages to Display.</h3>";
	}
?>
</div>
<div class="content" id="panel-3">
<?php if($all_messages!=null){?>
<table class="hovered">
	<thead>
    <tr>
		<th>From:</th>
		<th width="150">Subject</th>
		<th>Body</th>
		<th width="190"></th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach($all_messages as $message3){
?>
    <tr>
		<td><?php echo $message3['name'];?><br /><?php echo $message3['email_address'];?></td>
		<td><?php echo $message3['subject'];?></td>
		<td>
		<?php  
			$message_preview = strip_tags($message3['body']);
			
			if (strlen($message_preview) > 250) {
				$temp = substr($message_preview, 0, 250);
				$message_preview = substr($temp, 0, strrpos($temp, ' '))." ... <a href='admin.php?r=messages/view&id=".$message3['id']."' class='read-more'>Read more</a>";
			}
			echo $message_preview;
		?>
		</td>
		<td><ul class="button-group">
			<li><?php 
			echo CHtml::link('View', $this->createUrl('messages/view', array('id' =>  $message3['id'])), 
			array('class' => 'button tiny',));?>
			</li>
			<li><?php 
			echo CHtml::link('Delete', $this->createUrl('messages/delete', array('id' =>  $message3['id'])), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('messages/delete', array('id' =>  $message3['id'])),
										   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );
		   ?></li></ul>
		</td>
    </tr>
<?php
}
?>
	</tbody>
</table>
<?php
}
else{
	
		echo "<h3 class=\"subheader\">No Messages Received.</h3>";
	}
?>
</div>
</div>

