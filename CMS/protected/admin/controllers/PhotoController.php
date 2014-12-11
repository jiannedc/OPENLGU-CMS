<?php

class PhotoController extends Controller
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
				'actions'=>array('index','view','create','update', 'updatePartial','admin','delete'),
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
		$this->redirect(array('index','id'=>$id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Photo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
			$uploadFile=CUploadedFile::getInstance($model,'filename');
			$random = date('Y-m-d_His');
			$model->filename=$random.'_'.$uploadFile;
			
			if($model->save()){
				$uploadFile->saveAs(Yii::app()->basePath.'/../../images/'.$random.'_'.$uploadFile);
				$this->redirect(array('index','id'=>$model->photo_id));
			}
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Photo']))
		{
			$current_filename = $model->filename;
			$model->attributes=$_POST['Photo'];
			
			$uploadFile=CUploadedFile::getInstance($model,'filename');
			if($uploadFile){
				if(file_exists(Yii::app()->basePath.'/../../images/'.$current_filename))
					unlink(Yii::app()->basePath.'/../../images/'.$current_filename);
				$random = date('Y-m-d_His');
				$model->filename=$random.'_'.$uploadFile;
				$uploadFile->saveAs(Yii::app()->basePath.'/../../images/'.$random.'_'.$uploadFile);
			}else{
				$model->filename=$current_filename;
			}
			if($model->save()){
				$this->redirect(array('index'));
			}
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
		$model=Photo::model()->findByPk($id);
		if(file_exists(Yii::app()->basePath.'/../../images/'.$model->filename))
			unlink(Yii::app()->basePath.'/../../images/'.$model->filename);
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
		//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$dataProvider=new CActiveDataProvider('Photo');
		$dataProvider->setPagination(false);
		$data = $dataProvider->getData();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$viewModel=Photo::model()->findByPk($id);		
		}else{
			if($dataProvider->itemCount != 0){
				$viewModel = $data[0];
			}
			else{
				$viewModel=null;
			}
		}
		
		$model=new Photo;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'data'=> $data,
			'model'=>$model,
			'viewModel'=>$viewModel
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
			$model->attributes=$_GET['Photo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionUpdatePartial($id, $view)
    {
		$model=Photo::model()->findByPk($id);
		$this->renderPartial($view, array('model'=> $model));
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Photo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Photo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Photo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
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
