<?php

?>
<nav class="container-topbar">
	<div class="row">
		<div class="small-12 large-12 columns">
		<nav class="top-bar nomargin" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/seal-govph.png" />',array('site/index')); ?></h1>
				</li>
				<li class="toggle-topbar"><a href="#"></a></li>
			</ul>
		<section class="top-bar-section">		
		<?php
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,'encodeLabel' => false,
				'htmlOptions' => array('class' => 'left'),
				'items' => array(
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array(
						'label' => 'Home',
						'url' => array('/site/index'),
						'submenuOptions' => array('class' => 'dropdown'), //ul class
						'itemOptions' => array('class' => 'has-dropdown'), //each li class					
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'), //link <a> class
						'items' => array(
							array(
								'label' => 'Services',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Map and Location',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'About LGU',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'History',
										'url' => array('/site/page', 'view'=>'history'),
									),
									array(
										'label' => 'Mission & Vission',
										'url' => array('/site/page', 'view'=>'mission_vission'),
									),
									array(
										'label' => 'Local Officials',
										'url' => array('/site/page', 'view'=>'officials'),
									),
									array('label'=>'Add Submenu','url'=>array('controller/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array(
								'label' => 'Directory',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Local Government Offices',
										'url' => array('/site/page', 'view'=>'offices'),
									),
									array(
										'label' => 'Hospitals & Clinics',
										'url' => array('/site/page', 'view'=>'hospitals_clinics'),
									),
									array(
										'label' => 'Schools',
										'url' => array('/site/page', 'view'=>'schools'),
									),
									array(
										'label' => 'Police and Fire Stations',
										'url' => array('/site/page', 'view'=>'police_fire_stations'),
									),
									array(
										'label' => 'Hotels and Restaurants',
										'url' => array('/site/page', 'view'=>'hotel_restaurants'),
									),
									array(
										'label' => 'Malls & Amusement Centers',
										'url' => array('/site/page', 'view'=>'malls_amusement'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array(
								'label' => 'News and Events',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Announcements',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Publications',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Forums',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
							),							
						),
					),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array(
						'label' => 'For Residents',
						'url' => '#',
						'submenuOptions' => array('class' => 'dropdown'), //ul class
						'itemOptions' => array('class' => 'has-dropdown'), //each li class					
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'), //link <a> class
						'items' => array(
							array(
								'label' => 'Services',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'About LGU',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'History',
										'url' => array('/site/page', 'view'=>'history'),
									),
									array(
										'label' => 'Mission & Vission',
										'url' => array('/site/page', 'view'=>'mission_vission'),
									),
									array(
										'label' => 'Local Officials',
										'url' => array('/site/page', 'view'=>'officials'),
									),
									array('label'=>'Add Submenu','url'=>array('controller/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array(
								'label' => 'Directory',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Local Government Offices',
										'url' => array('/site/page', 'view'=>'offices'),
									),
									array(
										'label' => 'Hospitals & Clinics',
										'url' => array('/site/page', 'view'=>'hospitals_clinics'),
									),
									array(
										'label' => 'Schools',
										'url' => array('/site/page', 'view'=>'schools'),
									),
									array(
										'label' => 'Police and Fire Stations',
										'url' => array('/site/page', 'view'=>'police_fire_stations'),
									),
									array(
										'label' => 'Hotels and Restaurants',
										'url' => array('/site/page', 'view'=>'hotel_restaurants'),
									),
									array(
										'label' => 'Malls & Amusement Centers',
										'url' => array('/site/page', 'view'=>'malls_amusement'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
							),							
						),
					),			
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array(
						'label' => 'For Businesses',
						'url' => '#',
						'submenuOptions' => array('class' => 'dropdown'), //ul class
						'itemOptions' => array('class' => 'has-dropdown'), //each li class					
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'), //link <a> class
						'items' => array(
							array(
								'label' => 'Bussiness Permit and Licensing',
								'url' => array('/site/page', 'view'=>'services'),
							),
							array(
								'label' => 'Jobs and Recruitment',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Job Listing',
										'url' => array('/site/page', 'view'=>'job_listing'),
									),
									array(
										'label' => 'Job Submission',
										'url' => array('/site/page', 'view'=>'job_submission'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
							),
							
						),
					),			
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array(
						'label' => 'For Visitors',
						'url' => '#',
						'submenuOptions' => array('class' => 'dropdown'), //ul class
						'itemOptions' => array('class' => 'has-dropdown'), //each li class					
						//'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'), //link <a> class
						'items' => array(
							array(
								'label' => 'Local Heritage',
								'url' => array('/site/page', 'view'=>'local_heritage'),
							),
							array(
								'label' => 'Map & Location',
								'url' => array('/site/page', 'view'=>'map_and_location'),
							),
							array(
								'label' => 'Directory',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Local Government Offices',
										'url' => array('/site/page', 'view'=>'offices'),
									),
									array(
										'label' => 'Hospitals & Clinics',
										'url' => array('/site/page', 'view'=>'hospitals_clinics'),
									),
									array(
										'label' => 'Schools',
										'url' => array('/site/page', 'view'=>'schools'),
									),
									array(
										'label' => 'Police and Fire Stations',
										'url' => array('/site/page', 'view'=>'police_fire_stations'),
									),
									array(
										'label' => 'Hotels and Restaurants',
										'url' => array('/site/page', 'view'=>'hotel_restaurants'),
									),
									array(
										'label' => 'Malls & Amusement Centers',
										'url' => array('/site/page', 'view'=>'malls_amusement'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array(
								'label' => 'Tourist Information',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'Local Attractions and Festivals',
										'url' => array('/site/page', 'view'=>'job_listing'),
									),
									array(
										'label' => 'Accomodation',
										'url' => array('/site/page', 'view'=>'job_listing'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array(
								'label' => 'Travel Information',
								'url' => '#',
								'submenuOptions' => array('class' => 'dropdown'),
								'itemOptions' => array('class' => 'has-dropdown'),
								'items' => array(
									array(
										'label' => 'How To Get Here',
										'url' => array('/site/page', 'view'=>'job_listing'),
									),
									array(
										'label' => 'Moving Around',
										'url' => array('/site/page', 'view'=>'job_submission'),
									),
									array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
									),
								)
							),
							array('label'=>'Add Submenu','url'=>array('admin/action'),
										'visible'=>(Yii::app()->user->isAdmin())
							),							
						),
					),			
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
				),
			));
	
		$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'htmlOptions' => array('class' => 'right'),
				'items' => array(
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
					array('label' => 'SignUp', 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small')),
				),
			));
		?>
		</section>
		</nav>
		</div>
	</div>
	</nav>