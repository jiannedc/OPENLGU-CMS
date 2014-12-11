<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','create','update','admin','delete','view','announcement', 'news', 'publication'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=Article::model()->findByPk($id);
		if($model!=null){
			if($model->is_published == true || Yii::app()->user->isAdmin()){
			
			$photos = Yii::app()->db->createCommand()
			->select('p.filename, p.title, p.caption')
			->from('photo p')
			->join('article_photo ap', 'ap.photo_id = p.photo_id')
			->where('ap.article_id=:article_id ', array(':article_id'=>$id))
			->queryAll();

				$this->render('view',array(
					'model'=>$this->loadModel($id),
					'photos'=>$photos
				));
			}
			else
				throw new CHttpException(403,'The specified post is inaccessible.');
			
		}
		else{
			throw new CHttpException(404,'The specified post cannot be found.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Article;
		$this->setPageTitle('Articles');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			if($model->article_type=='publication'){
				$file_model=new File;
				$uploadFile=CUploadedFile::getInstance($model,'file_location');
				if($uploadFile){
					$random = date('Y-m-d_His');
					$file_model->file_location=$random.'_'.$uploadFile;
					$file_model->title=$model->article_header;
					$file_model->description=$model->article_body;
					$file_model->download_access="All";
					$file_model->is_publication=true;
					$model->file_location=$file_model->file_location;
				}
					if($file_model->save()){
						$uploadFile->saveAs(Yii::app()->basePath.'/../../uploads/'.$random.'_'.$uploadFile);
						$model->file_id=$file_model->file_id;
						echo $model->file_id;
					}
			}
			if($model->is_published == 1)
				$model->date_published = date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if($model->article_type=='publication'){
			echo $model->file_id;
			
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$file_model= File::model()->findByPk($model->file_id);
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->article_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionAnnouncement()
	{
		$announcement_dataProvider=new CActiveDataProvider('Article', array(
				'criteria'=>array(
					"condition"=>"article_type='announcement' and is_published=TRUE",
					//'order'=>'date_published DESC',
				),
				'countCriteria'=>array(
					"condition"=>"article_type='announcement' and is_published=TRUE",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
		$this->render('index',array(
			'dataProvider' => $announcement_dataProvider,
			'pageTitle' => 'Announcements'
		));
	
	}
	public function actionNews()
	{
		$news_dataProvider=new CActiveDataProvider('Article', array(
				'criteria'=>array(
					"condition"=>"article_type='news' and is_published=TRUE",
				),
				'countCriteria'=>array(
					"condition"=>"article_type='news' and is_published=TRUE",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));	
		$this->render('index',array(
			'dataProvider' => $news_dataProvider,
			'pageTitle' => 'News'
		));
	}
	public function actionPublication()
	{
		$publication_dataProvider=new CActiveDataProvider('Article', array(
				'criteria'=>array(
					"condition"=>"article_type='publication' and is_published=TRUE",
				),
				'countCriteria'=>array(
					"condition"=>"article_type='publication' and is_published=TRUE",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));	
		$this->render('index',array(
			'dataProvider' => $publication_dataProvider,
			'pageTitle' => 'Publications'
		));
	
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Article');
		$dataProvider->setPagination(false);
		$publication_dataProvider=new CActiveDataProvider('Article', array(
			'criteria'=>array(
				"condition"=>"article_type='publication'",
			),
			'countCriteria'=>array(
				"condition"=>"article_type='publication'",
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));	
		$news_dataProvider=new CActiveDataProvider('Article', array(
			'criteria'=>array(
				"condition"=>"article_type='news'",
			),
			'countCriteria'=>array(
				"condition"=>"article_type='news'",
			),
		));
		$announcement_dataProvider=new CActiveDataProvider('Article', array(
			'criteria'=>array(
				"condition"=>"article_type='announcement'",
				//'order'=>'date_published DESC',
			),
			'countCriteria'=>array(
				"condition"=>"article_type='announcement'",
			),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'publication_dataProvider'=>$publication_dataProvider,
			'news_dataProvider'=>$news_dataProvider,
			'announcement_dataProvider'=>$announcement_dataProvider,
			'pageTitle' => 'Articles'
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		$this->setPageTitle('Articles');
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
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
