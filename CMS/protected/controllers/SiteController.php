<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function searchFunction($keyword){
		$articleCriteria = new CDbCriteria;
		$articleCriteria->compare('LOWER(article_header)', strtolower($keyword), true, 'OR');
		$articleCriteria->compare('is_published', 'TRUE', true, 'OR');
		$searchArticles = Article::model()->findAll($articleCriteria);
		
		$fileCriteria = new CDbCriteria;
		$fileCriteria->compare('LOWER(title)', strtolower($keyword), true, 'OR');
		$fileCriteria->compare('LOWER(description)', strtolower($keyword), true, 'OR');		
		$fileCriteria->compare('download_access', 'All', true, 'AND');
		$searchFiles = File::model()->findAll($fileCriteria);
		
		$servicesCriteria = new CDbCriteria;
		$servicesCriteria->compare('LOWER(service_name)', strtolower($keyword), true, 'OR');
		$servicesCriteria->compare('LOWER(service_description)', strtolower($keyword), true, 'OR');
		$searchServices = Services::model()->findAll($servicesCriteria);
		
		$spageCriteria = new CDbCriteria;
		$spageCriteria->compare('LOWER(title)',strtolower($keyword), true, 'OR');
		$searchSpages = Spage::model()->findAll($spageCriteria);
		
		$this->render('searchResults', array(
			'searchArticles' => $searchArticles,
			'searchFiles' => $searchFiles,
			'searchServices' => $searchServices,
			'searchSpages' => $searchSpages,
		));
		
	
	}
	
	public function actionSearchResults(){

	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$news = Yii::app()->db->createCommand()
						->select()
						->from('article')
						->where('article_type=:article_type and is_featured=:is_featured', array(':article_type'=>'news', ':is_featured'=>'TRUE'))
						->order('date_published desc')
						->limit(3)
						->queryAll();
						
		$publications = Yii::app()->db->createCommand()
						->select()
						->from('article')
						->where('article_type=:article_type and is_featured=:is_featured', array(':article_type'=>'publication', ':is_featured'=>'TRUE'))
						->limit(5)
						->queryAll();
		
		$gallery_photos = Yii::app()->db->createCommand()
						->select()
						->from('photo')
						->where('show_gallery=:show_gallery', array('show_gallery'=>'TRUE'))
						->limit(4)
						->queryAll();
		$lgu_data = Yii::app()->db->createCommand()
					->select()
					->from('lgu_data')
					->where('active=:active', array(':active'=>'TRUE'))
					->queryRow();
		$headlines = Yii::app()->db->createCommand()
					->select()
					->from('slider')
					->where('slider_name=:slider_name', array(':slider_name'=>'headline'))
					->queryAll();
		$events = Yii::app()->db->createCommand()
					->select()
					->from('slider')
					->where('slider_name=:slider_name', array(':slider_name'=>'events'))
					->queryAll();
		if(isset($_GET['q'])){
			$this->searchFunction($_GET['q']);
		}else{
			$this->render('index', array(
				'news' => $news,
				'publications' => $publications,
				'gallery_photos' => $gallery_photos,
				'lgu_data' => $lgu_data,
				'headlines'=> $headlines,
				'events'=> $events,
				
			));
		}
	
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new Messages;
		if(isset($_POST['Messages']))
		{
			$model->attributes=$_POST['Messages'];
			echo $model->name;
			if($model->save()){
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionSignup()
	{
		$model=new User;

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if($model->user_type =='Resident')
				$model->privilege='r';
			if($model->user_type =='Business')
				$model->privilege='b';
			if($model->user_type =='Admin')
				$model->privilege='all';
			
			if($model->password != "")
				$model->password = crypt($model->password);

			if($model->save()){
				Yii::app()->user->setFlash('signup','Thank you for signing-up. We will respond to your request as soon as possible.');
				$this->refresh();
			}
		}
		$model->password = "";
		$this->render('signup',array(
			'model'=>$model,
		));
	}
	public function actionDownload($filename){

		$path= Yii::getPathOfAlias('webroot').'/uploads/'.$filename;

		if (file_exists($path)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($path));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($path));
			ob_clean();
			flush();
			readfile($path);
			exit;
		}
	}
	public function actionPage() {
		if(empty($_GET['view']))
			$this->actionIndex();
		$model = Spage::model()->findByUrl($_GET['view']);
		// if page is not found, then run a controller with that name
		if ($model === NULL){
			Yii::app()->runController($_GET['view']);
		}
		else{
			if($_GET['view']=="map_and_location"){
			$this->render('spages/map_and_location', array('model'=>$model));
			}else{
				if($_GET['view']=="gallery"){
					$this->render('spages/gallery', array('model'=>$model));
				}else{
					$this->render('spages/spage', array('model'=>$model));
				}
			}
		}
	}
	public function getItems($menu_id, $parent_id=null){
        $results = Yii::app()->getDb()->createCommand();
        $results->select('item_id, label, url')->from('menu_item');
 
        if($parent_id === null)
                $results->where('menu_id=:mid AND parent_id IS NULL', array(':mid'=>(int)$menu_id));
        else
                $results->where('menu_id=:mid AND parent_id=:pid', array(':mid'=>(int)$menu_id, ':pid'=>$parent_id));
 
        $results->order('sort_order ASC, label ASC');
        $results = $results->queryAll();
 
        $items = array();
 
        if(empty($results))
                return $items;
 
        foreach($results AS $result)
        {
            $childItems=$this->getItems($menu_id, $result['item_id']); 
			
			if(empty($childItems))
				$item_options = array();
			else
				$item_options = array('class' => 'has-dropdown');
			
			if($parent_id==null)
				$items[] = array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small'));
			            
			$items[] = array(
				'label'         => $result['label'],
				'url'           => $result['url'],
				'submenuOptions' => array('class' => 'dropdown'), //ul class
				'itemOptions' =>  $item_options, //each li class
				//'linkOptions'   =>  array('class'=>'listItemLink', 'title'=>$result['label']),
				'items'         => $childItems, 
             );
			 
        }
		if($parent_id==null)
				$items[] = array('label' => '', 'itemOptions' => array('class' => 'divider hide-for-small'));
 
        return $items;
	}
}