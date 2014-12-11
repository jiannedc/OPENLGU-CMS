<?php

/**
 * This is the model class for table "lgu_data".
 *
 * The followings are the available columns in table 'lgu_data':
 * @property integer $id
 * @property string $logo_location
 * @property string $agency_name
 * @property string $tagline
 * @property string $address
 * @property string $contact_no
 * @property string $fax_no
 * @property string $email_address
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $police_hotline
 * @property string $fire_hotline
 * @property string $hospital_hotline
 * @property string $traffic_hotline
 * @property string $disaster_hotline
 * @property string $disclaimer
 * @property string $copyright
 * @property boolean $active
 * @property boolean $show_video
 * @property boolean $show_events
 * @property boolean $video_url
 * @property boolean $google_map
 * @property boolean $masthead_color
 * @property boolean $banner_color
 */
class LguData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lgu_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agency_name, copyright, tagline', 'length', 'max'=>200),
			array('contact_no, fax_no, email_address', 'length', 'max'=>50),
			array('police_hotline, fire_hotline, hospital_hotline, traffic_hotline, disaster_hotline', 'length', 'max'=>25),
			array('logo_location, address, facebook_link, twitter_link, disclaimer, active, show_events, show_video, video_url, google_map, masthead_color, banner_color', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('agency_name, tagline, address, contact_no, fax_no, email_address, facebook_link, twitter_link, police_hotline, fire_hotline, hospital_hotline, traffic_hotline, disaster_hotline', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'logo_location' => 'Logo Location',
			'agency_name' => 'Agency Name',
			'tagline' => 'Tagline',
			'address' => 'Address',
			'contact_no' => 'Contact No',
			'fax_no' => 'Fax No',
			'email_address' => 'Email Address',
			'facebook_link' => 'Facebook Link',
			'twitter_link' => 'Twitter Link',
			'police_hotline' => 'Police Hotline',
			'fire_hotline' => 'Fire Hotline',
			'hospital_hotline' => 'Hospital Hotline',
			'traffic_hotline' => 'Traffic Hotline',
			'disaster_hotline' => 'Disaster Hotline',
			'disclaimer' => 'Disclaimer',
			'copyright' => 'Copyright',
			'active' => 'Active',
			'show_video' => 'Show Featured Video?',
			'show_events' => 'Show Events Slider On Home Page?',
			'video_url' => 'Video Link(Embed)',
			'google_map' => 'Google Maps (Embed)',
			'masthead_color' => 'Masthead Color',
			'banner_color' => 'Banner Color'
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

		$criteria->compare('agency_name',$this->agency_name,true);
		$criteria->compare('tagline',$this->tagline,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('fax_no',$this->fax_no,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('facebook_link',$this->facebook_link,true);
		$criteria->compare('twitter_link',$this->twitter_link,true);
		$criteria->compare('police_hotline',$this->police_hotline,true);
		$criteria->compare('fire_hotline',$this->fire_hotline,true);
		$criteria->compare('hospital_hotline',$this->hospital_hotline,true);
		$criteria->compare('traffic_hotline',$this->traffic_hotline,true);
		$criteria->compare('disaster_hotline',$this->disaster_hotline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LguData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
