<?php

/**
 * This is the model class for table "slider".
 *
 * The followings are the available columns in table 'slider':
 * @property integer $slider_id
 * @property string $slider_name
 * @property string $header
 * @property string $caption
 * @property string $image
 * @property string $photo_id
 * @property string $event_date
 * @property string $venue
 * @property string $has_image
 *
 * The followings are the available model relations:
 * @property Photo $photo
 */
class Slider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_date', 'length', 'max'=>50),
			array('slider_name, header, caption, image, photo_id, venue, has_image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('slider_name, header, caption, image, photo_id, event_date, venue', 'safe', 'on'=>'search'),
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
			'photo' => array(self::BELONGS_TO, 'Photo', 'photo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'slider_id' => 'Slider',
			'slider_name' => 'Slider Name',
			'header' => 'Header',
			'caption' => 'Caption',
			'image' => 'Image',
			'photo_id' => 'Photo',
			'event_date' => 'Event Date',
			'venue' => 'Venue',
			'has_image' => 'Has Image',
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

		$criteria->compare('slider_name',$this->slider_name,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('venue',$this->venue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
