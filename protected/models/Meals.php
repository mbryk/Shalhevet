<?php

class Meals extends CActiveRecord
{
    
        public $choices;
        
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'meals';
	}
        
        public function behaviors()
	{
		return array(
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('host,email, password,settings', 'required'),
			array('limit', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, host, email, password, date, settings, limit, signup_code, notes', 'safe', 'on'=>'search'),
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
			'host' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'date' => 'Shabbat',
			'settings' => 'Settings',
			'limit' => 'Limit',
			'signup_code' => 'Signup Code',
			'notes' => 'Notes',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('host',$this->host,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('limit',$this->limit,true);
		$criteria->compare('signup_code',$this->signup_code,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}  
        
        public function translateChoices($choices)
        {
            $result = '100';
            if(!$choices) return $result;
            if(isset($choices['listed'])) $result[1] = '1';
            if(isset($choices['random'])) $result[2] = '1';
            return $result;
        }
}