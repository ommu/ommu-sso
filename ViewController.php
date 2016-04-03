<?php
/**
 * ViewController
 * @var $this ViewController
 * @var $model InlisViews
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	List
 *	Down
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 3 April 2016, 14:23 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class ViewController extends Controller
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
				'actions'=>array('index','list','down'),
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
	public function actionList()
	{
		if(Yii::app()->request->isPostRequest) {
			$token = trim($_POST['token']);
			
			$user = ViewUsers::model()->findByAttributes(array('token_password' => $token), array(
				'select' => 'user_id',
			));
			
			if($user != null) {
				$criteria=new CDbCriteria;
				$criteria->select = array('catalog_id','creation_date');
				$criteria->compare('t.publish',1);
				$criteria->compare('t.user_id',$user->user_id);
				$criteria->group = 't.catalog_id';
				$criteria->order = 't.view_id DESC';
				
				$dataProvider = new CActiveDataProvider('InlisViews', array(
					'criteria'=>$criteria,
					'pagination'=>array(
						'pageSize'=>20,
					),
				));			
				$model = $dataProvider->getData();
				
				$data = '';
				if(!empty($model)) {
					foreach($model as $key => $item) {					
						$data[] = array(
							'catalog_id'=>$item->catalog_id,
							'creation_date'=>$item->creation_date,
						);					
					}
				} else
					$data = array();
			
				$pager = OFunction::getDataProviderPager($dataProvider);
				$get = array_merge($_GET, array($pager['pageVar']=>$pager['nextPage']));
				$nextPager = $pager['nextPage'] != 0 ? OFunction::validHostURL(Yii::app()->controller->createUrl('list', $get)) : '-';
				$return = array(
					'data' => $data,
					'pager' => $pager,
					'nextPager' => $nextPager,
				);
				
			} else {
				$return = array(
					'success'=>'0',
					'error'=>'USERNULL',
					'message'=>'error, user tidak ditemukan',
				);
			}
			echo CJSON::encode($return);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionDown()
	{
		if(Yii::app()->request->isPostRequest) {
			$id = trim($_POST['id']);
			$catalog = trim($_POST['catalog']);
			$token = trim($_POST['token']);
			
			if($id != null && $id != '') {
				$model=InlisViews::model()->findByPk($id);
				
				if($model != null) {
					$model->delete();
					$return = array(
						'success'=>'1',
						'message'=>'success, view berhasil dihapus',
					);					
				} else {
					$return = array(
						'success'=>'0',
						'error'=>'NULL',
						'message'=>'error, view tidak ditemukan',
					);					
				}
				
			} else {
				$user = ViewUsers::model()->findByAttributes(array('token_password' => $token), array(
					'select' => 'user_id',
				));
				
				if($user != null) {
					$model = InlisViews::model()->find(array(
						'select'    => 'view_id',
						'condition' => 'publish= :publish AND catalog_id= :catalog AND user_id= :user',
						'params'    => array(
							':publish' => 1,
							':catalog' => $catalog,
							':user' => $user->user_id,
						),
					));
					if($model != null) {
						$model->delete();
						$return = array(
							'success'=>'1',
							'message'=>'success, view berhasil dihapus',
						);
					} else {
						$return = array(
							'success'=>'0',
							'error'=>'NULL',
							'message'=>'error, catalog tidak dalam kondisi view',
						);					
					}
					
				} else {
					$return = array(
						'success'=>'0',
						'error'=>'USERNULL',
						'message'=>'error, user tidak ditemukan',
					);
				}				
			}
			echo CJSON::encode($return);
			
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
		$model = InlisViews::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='inlis-views-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
