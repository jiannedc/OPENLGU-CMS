<?php

class FileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/page';

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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('residents'),
				'expression'=>'Yii::app()->user->isResident()',
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('business'),
				'expression'=>'Yii::app()->user->isBusiness()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','residents','business'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	 public function actionResidents()
	{
		$dataProvider=new CActiveDataProvider('File', array(
				'criteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='Residents'",
				),
				'countCriteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='Residents'",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	 public function actionBusiness()
	{
		$dataProvider=new CActiveDataProvider('File', array(
				'criteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='Business'",
				),
				'countCriteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='Business'",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('File', array(
				'criteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='All'",
				),
				'countCriteria'=>array(
					"condition"=>"is_publication=FALSE and download_access='All'",
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=File::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-form')
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
