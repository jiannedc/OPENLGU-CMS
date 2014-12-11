<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
$this->layout="main";
$this->setPageTitle('User Management');
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Pending User', 'url'=>array('pending')),
);
?>

<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel2-1">All User Accounts</a></dd>
  <dd><a href="#panel2-2">Residents</a></dd>
  <dd><a href="#panel2-3">Business Owners</a></dd>
  <dd><a href="#panel2-4">Admins</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel2-1">
	<?php if($all_user!=null){?>
		<table>
		<thead>
		<tr>
			<th width="100">First Name</th>
			<th width="100">Last Name</th>
			<th >Address</th>
			<th width="100">Occupation</th>
			<th width="100">User Type</th>
			<th width="190"></th>
		</tr>
		</thead>
		<tbody>
	<?php
		foreach($all_user as $user){
	?>
		<tr>
			<td><?php echo $user['first_name'];?></td>
			<td><?php echo $user['last_name'];?></td>
			<td><?php echo $user['address'];?></td>
			<td><?php echo $user['occupation'];?></td>
			<td><?php echo $user['user_type'];?></td>
			<td><ul class="button-group even-2"><li><?php 
				 echo CHtml::link('Edit',array('user/update', 'id'=>$user['user_id']), array( 'class' => 'button tiny')); 
				?></li>
				<li><?php 
				echo CHtml::link('Delete', $this->createUrl('user/delete', array('id' =>  $user['user_id'])), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('user/delete', array('id' =>  $user['user_id'])),
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
	}else{
	
		echo "<h3 class=\"subheader\">No Approved Users.</h3>";
	}
	?>
  </div>
  <div class="content" id="panel2-2">
	<?php if($residents!=null){?>
    <table>
		<thead>
		<tr>
			<th width="100">First Name</th>
			<th width="100">Last Name</th>
			<th >Address</th>			
			<th width="100">Contact No.</th>
			<th width="100">Email</th>
			<th width="100">Occupation</th>
			<th width="190"></th>
		</tr>
		</thead>
		<tbody>
	<?php
		foreach($residents as $resident){
	?>
		<tr>
			<td><?php echo $resident['first_name'];?></td>
			<td><?php echo $resident['last_name'];?></td>
			<td><?php echo $resident['address'];?></td>			
			<td><?php echo $resident['contact_no'];?></td>			
			<td><?php echo $resident['email_address'];?></td>
			<td><?php echo $resident['occupation'];?></td>
			<td><ul class="button-group even-2"><li><?php 
				 echo CHtml::link('Edit',array('user/update', 'id'=>$resident['user_id']), array( 'class' => 'button tiny')); 
				?></li>
				<li><?php 
				echo CHtml::link('Delete', $this->createUrl('user/delete', array('id' =>  $resident['user_id'])), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('user/delete', array('id' =>  $resident['user_id'])),
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
	}else{
	
		echo "<h3 class=\"subheader\">No Approved Users.</h3>";
	}
	?>
  </div>
  <div class="content" id="panel2-3">
  
	<?php if($business!=null){?>
    <table>
		<thead>
		<tr>
			<th width="100">First Name</th>
			<th width="100">Last Name</th>
			<th >Address</th>			
			<th width="100">Contact No.</th>
			<th width="100">Email</th>
			<th width="100">Occupation</th>
			<th width="190"></th>
		</tr>
		</thead>
		<tbody>
	<?php
		foreach($business as $business1){
	?>
		<tr>
			<td><?php echo $business1['first_name'];?></td>
			<td><?php echo $business1['last_name'];?></td>
			<td><?php echo $business1['address'];?></td>			
			<td><?php echo $business1['contact_no'];?></td>			
			<td><?php echo $business1['email_address'];?></td>
			<td><?php echo $business1['occupation'];?></td>
			<td><ul class="button-group even-2"><li><?php 
				 echo CHtml::link('Edit',array('user/update', 'id'=>$business1['user_id']), array( 'class' => 'button tiny')); 
				?></li>
				<li><?php 
				echo CHtml::link('Delete', $this->createUrl('user/delete', array('id' =>  $business1['user_id'])), 
				array(
				   // for htmlOptions
				   'onclick' => ' {' . CHtml::ajax(array(
											'type'=>'POST',
											'url'=>$this->createUrl('user/delete', array('id' =>  $business1['user_id'])),
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
	}else{
	
		echo "<h3 class=\"subheader\">No Approved Users.</h3>";
	}
	?>
  </div>
  <div class="content" id="panel2-4">
  
	<?php if($admins!=null){?>
    <table>
		<thead>
		<tr>
			<th width="100">First Name</th>
			<th width="100">Last Name</th>	
			<th width="100">Contact No.</th>
			<th width="100">Email</th>
			<th width="100">Occupation</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
	<?php
		foreach($admins as $admin){
	?>
		<tr>
			<td><?php echo $admin['first_name'];?></td>
			<td><?php echo $admin['last_name'];?></td>		
			<td><?php echo $admin['contact_no'];?></td>			
			<td><?php echo $admin['email_address'];?></td>
			<td><?php echo $admin['occupation'];?></td>
			<td>
			<?php
				if($admin['user_id']!=1){
			?>
				<ul class="button-group even-2"><li><?php 
				 echo CHtml::link('Edit',array('user/update', 'id'=>$admin['user_id']), array( 'class' => 'button tiny')); 
				?></li>
				<li><?php 
				
					echo CHtml::link('Delete', $this->createUrl('user/delete', array('id' =>  $admin['user_id'])), 
					array(
					   // for htmlOptions
					   'onclick' => ' {' . CHtml::ajax(array(
												'type'=>'POST',
												'url'=>$this->createUrl('user/delete', array('id' =>  $admin['user_id'])),
												   'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
												   'success' => "js:function(html){  window.location.reload(true); }")) .
												   'return false;}', // returning false prevents the default navigation to another url on a new page 
					   'class' => 'button tiny',
					   )
				   );
			   ?></li></ul>
			   	<?php
					} else{
						echo CHtml::link('Edit',array('user/update', 'id'=>$admin['user_id']), array( 'class' => 'button tiny')); 
					}
					?>
			</td>
		</tr>
	<?php
	}
	?>
		</tbody>
	</table>
	<?php
	}else{
	
		echo "<h3 class=\"subheader\">No Approved Users.</h3>";
	}
	?>
  </div>
</div>