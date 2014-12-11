<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Pending User Accounts';
$this->breadcrumbs=array(
	'Pending Accounts',
);
?>
<nav class="navigation-bar light">
	<nav class="navigation-bar-content">
		<a class="element brand" href="#"><span class="icon-plus-2"></span> Add User </a>
		<span class="element-divider"></span>
		<div class="element input-element">
			<form>
				<div class="input-control text">
					<input type="text" placeholder="Search...">
					<button class="btn-search"></button>
				</div>
			</form>
		</div>
		<span class="element-divider"></span>
		<a class="element brand place-right" href="#"><span class="icon-cancel-2"></span> Remove Selected </a>
		<span class="element-divider place-right"></span>
	</nav>
</nav>

<table class="table hovered">
	<thead>
	<tr>
		<th class="text-left"><input type="checkbox" /></th>
		<th class="text-left">Sur name</th>
		<th class="text-left">First name</th>
		<th class="text-left">User Type</th>
		<th class="text-left">Username</th>
		<th class="text-left">Email Address</th>
		<th class="text-left">Address</th>
	</tr>
	</thead>

	<tbody>
		<tr><td><input type="checkbox" /></td><td>Bravo</td><td>Johnny</td><td class="right">Resident</td><td class="right">jbravo</td><td class="right">mr_bravo@hotmail.com</td><td>1022, Bravo street, Winterfell</td></tr>
		<tr><td><input type="checkbox" /></td><td>Explorer</td><td>Dora</td><td class="right">Resident</td><td class="right">dora</td><td class="right">wheres_dora@yahoo.com</td><td>123, Star Village, Winterfell</td></tr>
		<tr><td><input type="checkbox" /></td><td>Chrome</td><td>Google</td><td class="right">Business</td><td class="right">chrome</td><td class="right">chrome@gmail.com</td><td>1, Google street, Winterfell</td></tr>
		<tr><td><input type="checkbox" /></td><td>Wonderland</td><td>Alice</td><td class="right">Business</td><td class="right">alice_wonderland</td><td class="right">alice@wonderland.com</td><td>Wonderland</td></tr>
		<tr><td><input type="checkbox" /></td><td>Frozen</td><td>Elsa</td><td class="right">Resident</td><td class="right">queen_elsa</td><td class="right">frozen@gmail.com</td><td>Elsa's Castle</td></tr>
		<tr><td><input type="checkbox" /></td><td>Buffalo</td><td>Water</td><td class="right">Resident</td><td class="right">gulp</td><td class="right">gulp@yahoo.com</td><td>Muddy Water</td></tr>
	</tbody>

	<tfoot></tfoot>
</table>