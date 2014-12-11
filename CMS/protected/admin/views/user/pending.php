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
<div class="metro">
<h3>Pending Accounts</h3>
</div>

<?php if($users!=null){?>
<table class="hovered">
	<thead>
    <tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Occupation</th>
		<th>User Type</th>
		<th width="190"></th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach($users as $user){
?>
    <tr>
		<td><?php echo $user['first_name'];?></td>
		<td><?php echo $user['last_name'];?></td>
		<td><?php echo $user['address'];?></td>
		<td><?php echo $user['occupation'];?></td>
		<td><?php echo $user['user_type'];?></td>
		<td><ul class="button-group"><li><?php 
			echo CHtml::link('Approve', $this->createUrl('user/approveUser', array('id' =>  $user['user_id'], 'approve'=>TRUE)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('user/approveUser', array('id' =>  $user['user_id'], 'approve'=>TRUE)),
										   //'beforeSend' => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;else return false;}',
										   'success' => "js:function(html){  window.location.reload(true); }")) .
										   'return false;}', // returning false prevents the default navigation to another url on a new page 
			   'class' => 'button tiny',
			   )
		   );?></li>
			<li><?php 
			echo CHtml::link('Delete', $this->createUrl('user/approveUser', array('id' =>  $user['user_id'], 'approve'=>FALSE)), 
			array(
			   // for htmlOptions
			   'onclick' => ' {' . CHtml::ajax(array(
										'type'=>'POST',
										'url'=>$this->createUrl('user/approveUser', array('id' =>  $user['user_id'], 'approve'=>FALSE)),
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
	
		echo "<h3 class=\"subheader\">No Pending User Accounts.</h3>";
	}
?>
