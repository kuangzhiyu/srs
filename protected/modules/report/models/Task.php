<?php

/**
 * This is the model class for table "task".
 *
 * The followings are the available columns in table 'task':
 * @property integer $id
 * @property string $project_id
 * @property string $name
 * @property string $source
 * @property integer $is_imported
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Task the static model class
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
		return 'task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, name', 'required'),
			array('is_imported, created_by, created_at, updated_by, updated_at', 'numerical', 'integerOnly'=>true),
			array('project_id, name', 'length', 'max'=>255),
			array('source', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, name, source, is_imported, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project',
			'name' => 'Name',
			'source' => 'Source',
			'is_imported' => 'Is Imported',
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
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('is_imported',$this->is_imported);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}