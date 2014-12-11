<?php

class LguDataController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new LguData;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LguData']))
		{
			$model->attributes=$_POST['LguData'];
			$uploadFile=CUploadedFile::getInstance($model,'logo_location');
			$random = date('Y-m-d_His');
			$model->logo_location=$random.'_'.$uploadFile;
			echo $model->active;
			
			if($model->save()){
				$uploadFile->saveAs(Yii::app()->basePath.'/../../images/'.$random.'_'.$uploadFile);
				if($model->active==1){
					$lguData = Yii::app()->db->createCommand()
						->select('*')
						->from('lgu_data')
						->queryAll();
						foreach($lguData as $lguData_instance)
						{
							if($lguData_instance['id']!=$model->id){
								$cur_model= LguData::model()->findByPk($lguData_instance['id']);
								$cur_model->active=false;
								$cur_model->save();
							}
						}
				}
				$this->redirect(array('index'));
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

		if(isset($_POST['LguData']))
		{
			$current_filename = $model->logo_location;
			$model->attributes=$_POST['LguData'];
			$uploadFile=CUploadedFile::getInstance($model,'logo_location');
			if($uploadFile){
				$random = date('Y-m-d_His');
				$model->logo_location=$random.'_'.$uploadFile;
			}else
				$model->logo_location=$current_filename;
			if($model->save()){
				if($model->logo_location!=$current_filename)$uploadFile->saveAs(Yii::app()->basePath.'/../../images/'.$random.'_'.$uploadFile);
				if($model->active==1){
					$lguData = Yii::app()->db->createCommand()
						->select('*')
						->from('lgu_data')
						->queryAll();
						foreach($lguData as $lguData_instance)
						{
							if($lguData_instance['id']!=$model->id){
								$cur_model= LguData::model()->findByPk($lguData_instance['id']);
								$cur_model->active=false;
								$cur_model->save();
							}
						}
				}
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LguData');
		$dataProvider_draft=new CActiveDataProvider('LguData', array(
				'criteria'=>array(
					"condition"=>"active=FALSE",
					"order"=>"id DESC",
				),
		));
		$dataProvider_active=new CActiveDataProvider('LguData', array(
				'criteria'=>array(
					"condition"=>"active=TRUE",
				),
			));
		$this->render('index',array(
			'dataProvider_draft'=>$dataProvider_draft,
			'dataProvider_active'=>$dataProvider_active,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LguData('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LguData']))
			$model->attributes=$_GET['LguData'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LguData the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LguData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LguData $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lgu-data-form')
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
