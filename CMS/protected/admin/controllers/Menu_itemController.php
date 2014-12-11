<?php

class Menu_itemController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function getChildren($parent, $level=0) { 
		$criteria = new CDbCriteria;
		$criteria->condition='parent_id=:id';
		$criteria->params=array(':id'=>$parent);
		$model = $this->findAll($criteria);
		foreach ($model as $key) {
			echo str_repeat(' — ', $level) . $key->name . "<br />";
			$this->getChildren($key->id, $level+1);
		}
	}
	public function getChildrenString($parent) { 
		$criteria = new CDbCriteria;
		$criteria->condition='parent_id=:id';
		$criteria->params=array(':id'=>$parent);
		$model = $this->findAll($criteria);
		foreach ($model as $key) {
			$storage .= $key->id . ","; 
			$storage .= $this->getChildrenString($key->id);
		}
		return $storage;
	}
}