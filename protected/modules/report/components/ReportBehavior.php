<?php

class ReportBehavior extends CActiveRecordBehavior {


	public function beforeSave($event) 
	{
		echo 'debug 2';
		parent::afterSave($event);
		return true;
	}

	public function afterSave($event) 
	{
		echo 'debug 1';
		parent::afterSave($event);
		return true;
	}
}