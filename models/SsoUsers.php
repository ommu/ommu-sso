<?php
/**
 * SsoUsers
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (www.ommu.co)
 * @created date 29 March 2016, 16:13 WIB
 * @link https://github.com/ommu/ommu-inlis-sso
 *
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 *
 * --------------------------------------------------------------------------------------
 *
 * This is the model class for table "ommu_sso_users".
 *
 * The followings are the available columns in table 'ommu_sso_users':
 * @property string $id
 * @property string $user_id
 * @property string $member_id
 * @property string $mkrtk_radius
 * @property integer $change_password
 * @property string $creation_date
 * @property string $creation_id
 * @property string $modified_date
 * @property string $modified_id
 */
class SsoUsers extends CActiveRecord
{
	use GridViewTrait;

	public $defaultColumns = array();
	public $email_input;
	public $displayname_input;
	public $password_input;
	
	// Variable Search
	public $user_search;
	public $member_search;
	public $creation_search;
	public $modified_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SsoUsers the static model class
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
		return 'ommu_sso_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, member_id', 'required'),
			array('
				email_input, displayname_input', 'required', 'on'=>'frontGenerate, adminGenerate'),
			array('
				email_input, displayname_input, password_input', 'required', 'on'=>'frontGeneratePlusPassword, adminGeneratePlusPassword'),
			array('user_id, member_id, change_password, creation_id, modified_id', 'length', 'max'=>11),
			array('mkrtk_radius', 'length', 'max'=>32),
			array('email_input', 'email'),
			array('user_id, mkrtk_radius,
				email_input, displayname_input, password_input', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, member_id, mkrtk_radius, change_password, creation_date, creation_id, modified_date, modified_id,
				user_search, member_search, creation_search, modified_search', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'member' => array(self::BELONGS_TO, 'SyncMembers', 'member_id'),
			'creation' => array(self::BELONGS_TO, 'Users', 'creation_id'),
			'modified' => array(self::BELONGS_TO, 'Users', 'modified_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('attribute', 'ID'),
			'user_id' => Yii::t('attribute', 'User'),
			'member_id' => Yii::t('attribute', 'Member'),
			'mkrtk_radius' => Yii::t('attribute', 'Mkrtk Radius'),
			'change_password' => Yii::t('attribute', 'Change Password'),
			'creation_date' => Yii::t('attribute', 'Creation Date'),
			'creation_id' => Yii::t('attribute', 'Creation'),
			'modified_date' => Yii::t('attribute', 'Modified Date'),
			'modified_id' => Yii::t('attribute', 'Modified'),
			'user_search' => Yii::t('attribute', 'User'),
			'member_search' => Yii::t('attribute', 'Member'),
			'creation_search' => Yii::t('attribute', 'Creation'),
			'modified_search' => Yii::t('attribute', 'Modified'),
			'email_input' => Yii::t('attribute', 'Email'),
			'displayname_input' => Yii::t('attribute', 'Name'),
			'password_input' => Yii::t('attribute', 'Password'),
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

		$criteria->compare('t.id', strtolower($this->id), true);
		if(Yii::app()->getRequest()->getParam('user'))
			$criteria->compare('t.user_id', Yii::app()->getRequest()->getParam('user'));
		else
			$criteria->compare('t.user_id', $this->user_id);
		$criteria->compare('t.member_id', $this->member_id);
		$criteria->compare('t.mkrtk_radius', $this->mkrtk_radius,true);
		$criteria->compare('t.change_password', $this->change_password);
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.creation_date)', date('Y-m-d', strtotime($this->creation_date)));
		if(Yii::app()->getRequest()->getParam('creation'))
			$criteria->compare('t.creation_id', Yii::app()->getRequest()->getParam('creation'));
		else
			$criteria->compare('t.creation_id', $this->creation_id);
		if($this->modified_date != null && !in_array($this->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.modified_date)', date('Y-m-d', strtotime($this->modified_date)));
		if(Yii::app()->getRequest()->getParam('modified'))
			$criteria->compare('t.modified_id', Yii::app()->getRequest()->getParam('modified'));
		else
			$criteria->compare('t.modified_id', $this->modified_id);
		
		// Custom Search
		$criteria->with = array(
			'user' => array(
				'alias'=>'user',
				'select'=>'displayname',
			),
			'member' => array(
				'alias'=>'member',
				'select'=>'Fullname',
			),
			'creation' => array(
				'alias'=>'creation',
				'select'=>'displayname',
			),
			'modified' => array(
				'alias'=>'modified',
				'select'=>'displayname',
			),
		);
		$criteria->compare('user.displayname', strtolower($this->user_search), true);
		$criteria->compare('member.Fullname', strtolower($this->member_search), true);
		$criteria->compare('creation.displayname', strtolower($this->creation_search), true);
		$criteria->compare('modified.displayname', strtolower($this->modified_search), true);
		
		if(!Yii::app()->getRequest()->getParam('SsoUsers_sort'))
			$criteria->order = 't.id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		} else {
			//$this->defaultColumns[] = 'id';
			$this->defaultColumns[] = 'user_id';
			$this->defaultColumns[] = 'member_id';
			$this->defaultColumns[] = 'mkrtk_radius';
			$this->defaultColumns[] = 'change_password';
			$this->defaultColumns[] = 'creation_date';
			$this->defaultColumns[] = 'creation_id';
			$this->defaultColumns[] = 'modified_date';
			$this->defaultColumns[] = 'modified_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			/*
			$this->defaultColumns[] = array(
				'class' => 'CCheckBoxColumn',
				'name' => 'id',
				'selectableRows' => 2,
				'checkBoxHtmlOptions' => array('name' => 'trash_id[]')
			);
			*/
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = array(
				'name' => 'user_search',
				'value' => '$data->user->displayname',
			);
			/*
			$this->defaultColumns[] = array(
				'name' => 'member_search',
				'value' => '$data->member->displayname',
			);
			*/
			$this->defaultColumns[] = array(
				'name' => 'creation_search',
				'value' => '$data->creation_id != 0 ? $data->creation->displayname : "-"',
			);
			$this->defaultColumns[] = array(
				'name' => 'creation_date',
				'value' => 'Utility::dateFormat($data->creation_date)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => $this->filterDatepicker($this, 'creation_date'),
			);
			if(!Yii::app()->getRequest()->getParam('type')) {
				$this->defaultColumns[] = array(
					'name' => 'change_password',
					'value' => '$data->change_password == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\')',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter' => $this->filterYesNo(),
					'type' => 'raw',
				);
			}
		}
		parent::afterConstruct();
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::model()->findByPk($id, array(
				'select' => $column,
			));
 			if(count(explode(',', $column)) == 1)
 				return $model->$column;
 			else
 				return $model;
			
		} else {
			$model = self::model()->findByPk($id);
			return $model;
		}
	}

	/**
	 * User get information
	 */
	public static function setChangePassword($id, $password=null)
	{
		$setting = SsoSettings::model()->findByPk(1, array(
			'select' => 'password_safe, network_radius_enable, network_radius_customer, network_radius_profile, network_radius_shared',
		));
		Yii::import('application.modules.sso.components.plugins.routeros.*');
		
		$data = array();
		if($setting->password_safe == 1)
			$data['mkrtk_radius'] = $password;
		$data['change_password'] = 1;
		
		$ssoUser = self::model()->findByAttributes(array('user_id' => $id));
		if($ssoUser != null) {
			self::model()->updateByPk($ssoUser->id, $data);
			
			$api = new ORouterosAPI;
			$api->command('/tool/user-manager/user/set', array(
				'numbers'=>$ssoUser->member->MemberNo,
				'password'=>$password,
			));
		}
		
		return true;
	}

	/**
	 * before validate attributes
	 */
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			if($this->isNewRecord) {
				if($this->email_input != '') {
					$user = Users::model()->findByAttributes(array('email' => $this->email_input));
					if($user != null)
						$this->addError('email_input', Yii::t('phrase', 'Email sudah terdaftar sebagai member'));
					
					else {
						$ssoUser = self::model()->findByAttributes(array('member_id' => $this->member_id));
						if($ssoUser != null)
							$this->addError('email_input', Yii::t('phrase', 'Member sudah terdaftar silahkan login'));
						
						else {
							$user=new Users;
							$user->email = $this->email_input;
							$user->displayname = $this->displayname_input;
							if(OmmuSettings::getInfo('signup_random') == 0)
								$user->confirmPassword = $user->newPassword = $this->password_input;
							if($user->save()) {
								$this->user_id = $user->user_id;
								if(SsoSettings::getInfo(1, 'password_safe') == 1)
									$this->mkrtk_radius = $user->newPassword;
							}
						}
					}
				}
				$this->creation_id = Yii::app()->user->id;				
			} else
				$this->modified_id = Yii::app()->user->id;
		}
		return true;
	}
	
	/**
	 * After save attributes
	 */
	protected function afterSave() {
		parent::afterSave();
		
		$setting = SsoSettings::model()->findByPk(1, array(
			'select' => 'network_radius_enable, network_radius_customer, network_radius_profile, network_radius_shared',
		));
		Yii::import('application.modules.sso.components.plugins.routeros.*');
		
		if($this->isNewRecord) {
			if($setting->network_radius_enable == 1) {
				$api = new ORouterosAPI;
				$data = array(
					'customer'=>$setting->network_radius_customer,
					//'actual-profile'=>$setting->network_radius_profile,	
					'username'=>$this->member->MemberNo,
					'password'=>$this->mkrtk_radius,
					'shared-users'=>$setting->network_radius_shared,
					'email'=>$this->user->email,
				);
				if($this->member->NoHp != null && $this->member->NoHp != '')
					$data['phone'] = $this->member->NoHp;
				if($this->member->Kota != null && $this->member->Kota != '')
					$data['location'] = $this->member->Kota;
				
				$api->command('/tool/user-manager/user/add', $data);
				$api->command('/tool/user-manager/user/create-and-activate-profile', array(
					'numbers'=>$this->member->MemberNo,
					'customer'=>$setting->network_radius_customer,
					'profile'=>$setting->network_radius_profile,						
				));
			}
		}
	}

	/**
	 * After delete attributes
	 */
	protected function afterDelete() {
		parent::afterDelete();
		
		$setting = SsoSettings::model()->findByPk(1, array(
			'select' => 'network_radius_enable',
		));
		Yii::import('application.modules.sso.components.plugins.routeros.*');
		
		if($setting->network_radius_enable == 1) {
			$api = new ORouterosAPI;
			$api->command('/tool/user-manager/user/remove', array(
				'numbers'=>$this->member->MemberNo,					
			));
		}		
	}

}