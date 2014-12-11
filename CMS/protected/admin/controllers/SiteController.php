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
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		if(Yii::app()->user->isGuest){
			throw new CHttpException(403,'You are not allowed to view this page');
		}else{
			if(Yii::app()->user->isAdmin()){
				$pending_count= Yii::app()->db->createCommand()
						->select('COUNT(*)')
						->from('user')
						->where('pending_account=:pending_account', array(':pending_account'=>'TRUE'))
						->queryScalar();
				$unread_messages= Yii::app()->db->createCommand()
						->select('COUNT(*)')
						->from('messages')
						->where('read=:read', array(':read'=>'FALSE'))
						->queryScalar();
				$this->render('index', array('pending_count'=>$pending_count, 'unread_messages' => $unread_messages ));
			}
			else{
				Yii::app()->user->logout();
				throw new CHttpException(403,'You are not allowed to view this page');
			}
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

	/**
	 * Displays the login page
	 */
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
					$this->redirect(array('index'));
		}
		if(Yii::app()->user->isGuest)
			$this->render('login',array('model'=>$model));
		else
			if(Yii::app()->user->isAdmin())
				$this->redirect(array('index'));
			
		// display the login form
		
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

			if($model->save())
				$this->redirect(Yii::app()->homeUrl);
		}
		$model->password = "";
		$this->render('signup',array(
			'model'=>$model,
		));
	}
	public function actionDownload($filename){
       // $file=$_GET['filename'];
		$path= Yii::getPathOfAlias('webroot').'/uploads/'.$filename;
	//	echo $path;
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
		//$this->redirect(Yii::app()->user->returnUrl);
	/*	if(file_exists($path)){
			return Yii::app()->request->xSendFile($path,array(
			   'saveName'=>$filename,
				'mimeType'=>'pdf',
			   'terminate'=>false,
			));
Yii::app()->getRequest()->sendFile("my_doc.pdf",@file_get_contents($path));
		}*/

	}
	public function mailsend($to,$subject,$message){
		
		$mail=Yii::app()->Smtpmail;
		$mail->Subject=$subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($to, '');
		$mail->FromName="LGU Website Admin";
		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}else {
			echo "Message sent!";
		}
		$mail->ClearAddresses(); //clear addresses for next email sending
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
			$this->render('spages/spage', array('model'=>$model));
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