<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property integer $id
 * @property integer $user_id
 * @property integer $task_id
 * @property integer $is_draft
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Report extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Report the static model class
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
		return 'report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task_id', 'required'),
			array('id, task_id,', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, task_id, date, is_draft, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'task_id' => 'Task',
			'date' => 'Date',
			'is_draft' => 'Is Draft',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
			'updated_by' => 'Updated By',
			'updated_at' => 'Updated At',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('date',$this->date);
		$criteria->compare('is_draft',$this->is_draft);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Check whether the date was reported based on the user_id
	 * @param $date the specify day
	 * @param $userId the specify user
	 * @return true/false
	 */
	public function checkDayIsReported($date, $user_id) {
		
		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$user_id);
		$criteria->compare('date',$date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}