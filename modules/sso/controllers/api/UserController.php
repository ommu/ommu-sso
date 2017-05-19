<?php
/**
 * UserController
 * @var $this UserController
 * @var $model SsoUsers
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	GetMember
 *	Generate
 *	Login
 *	ChangePassword
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 29 March 2016, 17:15 WIB
 * @link http://company.ommu.co
 * @contact (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class UserController extends ControllerApi
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'index';

	/**
	 * @return array action filters
	 */
	public function filters() 
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','getmember','generate','login','changepassword'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level)',
				//'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level != 1)',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() 
	{
		$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionGetMember() 
	{
		if(Yii::app()->request->isPostRequest) {
			$membernumber = trim($_POST['membernumber']);
			
			$criteria=new CDbCriteria;
			$criteria->compare('MemberNo', $membernumber);
			
			$model = SyncMembers::model()->find($criteria);
				
			if($model != null) {
				if($model->users == null) {
					$return['success'] = '1';
				} else {
					$return['success'] = '0';
					$return['error'] = 'USER_ENABLE';
					$return['message'] = Yii::t('phrase', 'error, member sudah terdaftar silahkan login');
				}				
				$return['member_id'] = $model->ID;
				$return['member_number'] = trim($model->MemberNo);
				$return['fullname'] = ucwords(strtolower(trim($model->Fullname)));
				$return['email'] = $model->Email != null && $model->Email != '' ? strtoupper(trim($model->Email)) : '-';
				$return['phone_number'] = $model->NoHp != null && $model->NoHp != '' ? trim($model->NoHp) : '-';
				$return['status'] = strtoupper(trim($model->StatusAnggota));
				$return['member_type'] = strtoupper(trim($model->JenisAnggota));
			} else {
				$return['success'] = '0';
				$return['error'] = 'MEMBER_NULL';
				$return['message'] = Yii::t('phrase', 'error, member tidak ditemukan');
			}
			$this->_sendResponse(200, CJSON::encode($this->renderJson($return)));
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionGenerate() 
	{
		if(Yii::app()->request->isPostRequest) {
			$email = trim($_POST['email']);
			$member = trim($_POST['member']);
			$displayname = trim($_POST['displayname']);
			
			$userFind = Users::model()->findByAttributes(array('email' => $email));
			if($userFind == null) {
				$memberFind = SsoUsers::model()->findByAttributes(array('member_id' => $member));
				if($memberFind == null) {
					$model=new Users;
					$model->email = $email;
					$model->displayname = $displayname;
					if($model->save()) {
						$user=new SsoUsers;
						$user->user_id = $model->user_id;
						$user->member_id = $member;
						if(SsoSettings::getInfo(1, 'password_safe') == 1)
							$user->mkrtk_radius = $model->newPassword;
						if($user->save()) {
							$return['success'] = '1';
							$return['message'] = 'success';
							
						} else {
							$return['success'] = '0';
							$return['error'] = 'USER_INLIS_NOT_SAVE';
							$return['message'] = Yii::t('phrase', 'error, user inlis sso gagal ditambahkan');							
						}
					} else {
						$return['success'] = '0';
						$return['error'] = 'USER_NOT_SAVE';
						$return['message'] = Yii::t('phrase', 'error, user gagal ditambahkan');
					}
				} else {
					$return['success'] = '0';
					$return['error'] = 'USER_ENABLE';
					$return['message'] = Yii::t('phrase', 'error, member sudah terdaftar silahkan login');
				}
			} else {
				$return['success'] = '0';
				$return['error'] = 'USER_EMAIL_ENABLE';
				$return['message'] = Yii::t('phrase', 'error, email sudah terdaftar sebagai member');
			}
			
			$this->_sendResponse(200, CJSON::encode($this->renderJson($return)));
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionLogin() 
	{
		if(Yii::app()->request->isPostRequest) {
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			
			$server = SsoUtility::getConnected();
			if($server != 'neither-connected') {
				if(in_array($server, Yii::app()->params['sso_server_options']['localhost']))
					$server = $server.'/ommu_sso';			
				$url = $server.preg_replace('('.Yii::app()->request->baseUrl.')', '', Yii::app()->createUrl('users/api/site/login'));
				
				$item = array(
					'email' => $email,
					'password' => $password,
				);
				$items = http_build_query($item);
			
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($ch,CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $items);
				$output=curl_exec($ch);
				
				if($output === false) {
					$return['success'] = '0';
					$return['error'] = 'NETWORK_NOTCONENCT';
					$return['message'] = Yii::t('phrase', 'error, not connected');
					
				} else {
					$object = 'en'on_decode($output);
					$return = $object;
					
					if($object->success == 1) {
						$user = ViewUsers::model()->findByAttributes(array('token_password' => $object->token));
						$member = SsoUsers::model()->findByAttributes(array('user_id' => $user->user_id));
						
						$image = '/uploaded_files/foto_anggota/'.$member->member->PicPath;
						$photo = Yii::app()->params['inlis_address'].$image;
						
						$return->member_id = $member != null ? $member->member->ID : '-';
						$return->member_number = $member != null ? trim($member->member->MemberNo) : '-';
						$return->address = $member != null ? ucwords(strtolower(trim($member->member->Address))) : '-';
						$return->photo = $member != null ? ($member->member->PicPath != null && $member->member->PicPath != '' ? (file_exists($photo) ? $photo : '-') : '-') : '-';
						$return->birthday = $member != null ? ($member->member->PlaceOfBirth != '' ? ucwords(strtolower(trim($member->member->PlaceOfBirth.', '.Utility::dateFormat($member->member->DateOfBirth)))) : ucwords(strtolower(Utility::dateFormat($member->member->DateOfBirth)))) : '-';
						$return->phone_number = $member != null ? ($member->member->NoHp != null && $member->member->NoHp != '' ? trim($member->member->NoHp) : '-') : '-';
						$return->status = $member != null ? strtoupper(trim($member->member->StatusAnggota)) : '-';
						$return->member_type = $member != null ? strtoupper(trim($member->member->JenisAnggota)) : '-';
						$return->change_password = $member != null ? $member->change_password : '-';
					}
				}
				$this->_sendResponse(200, CJSON::encode($this->renderJson($return)));

			} else
				return false;			
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionChangePassword() 
	{
		if(Yii::app()->request->isPostRequest) {
			$token = trim($_POST['token']);
			$password = trim($_POST['password']);
			$newpassword = trim($_POST['newpassword']);
			$confirmpassword = trim($_POST['confirmpassword']);	
			
			$server = SsoUtility::getConnected();
			if($server != 'neither-connected') {
				if(in_array($server, Yii::app()->params['sso_server_options']['localhost']))
					$server = $server.'/ommu_sso';			
				$url = $server.preg_replace('('.Yii::app()->request->baseUrl.')', '', Yii::app()->createUrl('users/api/member/changepassword'));
				
				$user = ViewUsers::model()->findByAttributes(array('token_password' => $token));	
				$item = array(
					'token' => $token,
					'password' => $password,
					'newpassword' => $newpassword,
					'confirmpassword' => $confirmpassword,
				);
				$items = http_build_query($item);
			
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($ch,CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $items);
				$output=curl_exec($ch);
				
				if($output === false) {
					$return['success'] = '0';
					$return['error'] = 'NETWORK_NOTCONENCT';
					$return['message'] = Yii::t('phrase', 'error, not connected');
					
				} else {
					$object = 'en'on_decode($output);
					$return = $object;
					if($object->success == 1) {
						$member = SsoUsers::model()->findByAttributes(array('user_id' => $user->user_id));
						if($member != null && $member->change_password == 0) {
							$member->change_password = 1;
							$member->save();
						}
					}				
				}
				$this->_sendResponse(200, CJSON::encode($this->renderJson($return)));
				
			} else
				return false;
			
		} else
			$this->redirect(Yii::app()->createUrl('site/index'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = SsoUsers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Yii::t('phrase', 'The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) 
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sso-users-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
