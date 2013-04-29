<?php

class Shabbat extends CActiveRecord
{
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
		return 'shabbatot';
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
			array('id, date, total_matched', 'safe', 'on'=>'search'),
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
			'date' => 'Shabbat',
			'total_matched' => 'Total Matched',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('total_matched',$this->total_matched,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}  
        
        public function nextShabbat()
        {
            $shabbat = $this->find();
            if($shabbat->date< time())
                $shabbat = $this->newShabbat($shabbat);
            return $shabbat->id;
        }
        
        public function newShabbat($last_shabbat)
        {
            $shabbat = new Shabbat();
            $shabbat->date = $last_shabbat->date; //add one week to date
            $shabbat->total_matched = 0;
            if($shabbat->save())
                return $shabbat;
        }
}