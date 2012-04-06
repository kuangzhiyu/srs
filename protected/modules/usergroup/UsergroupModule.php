<?php
Yii::setPathOfAlias('UsergroupModule' , dirname(__FILE__));

class UsergroupModule extends CWebModule {

	private $_tables = array(
			'usergroup' => 'user_group',
			'usergroupMessages' => 'user_group_message',
			);

	public $controllerMap=array(
			'groups'=>array(
				'class'=>'UsergroupModule.controllers.YumUsergroupController'),
			);

	public function init() {
		$this->setImport(array(
					'application.modules.user.controllers.*',
					'application.modules.user.models.*',
					'application.modules.usergroup.controllers.*',
					'application.modules.usergroup.models.*',
					));
	}
	
	
	/**
	 * Implements support for getting URLs, Tables and Views
	 * @param string $name
	 */
	public function __get($name) {
		if(substr($name, -3) === 'Url')
			if(isset($this->_urls[substr($name, 0, -3)]))
				return Yum::route($this->_urls[substr($name, 0, -3)]);

		if(substr($name, -4) === 'View')
			if(isset($this->_views[substr($name, 0, -4)]))
				return $this->_views[substr($name, 0, -4)];

		if(substr($name, -5) === 'Table')
			if(isset($this->_tables[substr($name, 0, -5)]))
				return $this->_tables[substr($name, 0, -5)];

		return parent::__get($name);
	}

	/**
	 * Implements support for setting URLs and Views
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name,$value) {
		if(substr($name,-3)==='Url') {
			if(isset($this->_urls[substr($name,0,-3)]))
				$this->_urls[substr($name,0,-3)]=$value;
		}
		if(substr($name,-4)==='View') {
			if(isset($this->_views[substr($name,0,-4)]))
				$this->_views[substr($name,0,-4)]=$value;
		}
		if(substr($name,-5)==='Table') {
			if(isset($this->_tables[substr($name,0,-5)]))
				$this->_tables[substr($name,0,-5)]=$value;
		}

		//parent::__set($name,$value);
	}


}
