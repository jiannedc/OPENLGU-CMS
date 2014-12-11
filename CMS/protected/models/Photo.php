<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $photo_id
 * @property string $filename
 * @property string $title
 * @property string $caption
 * @property boolean $show_banner
 * @property boolean $show_gallery
 *
 * The followings are the available model relations:
 * @property ArticlePhoto[] $articlePhotos
 */
class Photo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename', 'length', 'max'=>100),
			array('title', 'length', 'max'=>50),
			array('caption, show_banner, show_gallery', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('title, caption', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'articlePhotos' => array(self::HAS_MANY, 'ArticlePhoto', 'photo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'photo_id' => 'Photo',
			'filename' => 'Filename',
			'title' => 'Title',
			'caption' => 'Caption',
			'show_banner' => 'Show Banner',
			'show_gallery' => 'Show Gallery',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('title',$this->title,true);
		$criteria->compare('caption',$this->caption,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
