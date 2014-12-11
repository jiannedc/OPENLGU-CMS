<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $email_address
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $contact_no
 * @property string $occupation
 * @property string $user_type
 * @property string $privilege
 * @property boolean $pending_account
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email_address, first_name, last_name, address, user_type, privilege', 'required'),
			array('username', 'length', 'max'=>25),
			array('password, email_address, first_name, last_name, contact_no, occupation', 'length', 'max'=>50),
			array('address', 'length', 'max'=>100),
			array('pending_account', 'safe'),
			array('username', 'unique'),
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
			'user_id' => 'User',
			'username' => 'Username',
			'password' => 'Password',
			'email_address' => 'Email Address',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address' => 'Address',
			'contact_no' => 'Contact No',
			'occupation' => 'Occupation',
			'user_type' => 'User Type',
			'privilege' => 'Privilege',
			'pending_account' => 'Pending Account',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
