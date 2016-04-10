<?php
/**
 * LikeController
 * @var $this LikeController
 * @var $model InlisLikes
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	List
 *	Run
 *	toggle
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 3 April 2016, 14:21 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class LikeController extends Controller
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
				'actions'=>array('index','list','run'),
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
			
			$criteria=new CDbCriteria;
			$criteria->with = array(
				'user.view' => array(
					'alias'=>'view',
				),
			);
			$criteria->select = array('t.catalog_id','t.creation_date');
			$criteria->compare('t.publish',1);
			$criteria->compare('view.token_password',$token);
			$criteria->group = 't.catalog_id';
			$criteria->order = 't.like_id DESC';
			
			$dataProvider = new CActiveDataProvider('InlisLikes', array(
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
						'title'=>$item->catalog->Title != null && $item->catalog->Title != '' ? $item->catalog->Title : '-',
						'author'=>$item->catalog->Author != null && $item->catalog->Author != '' ? $item->catalog->Author : '-',
						'publisher'=>$item->catalog->Publisher != null && $item->catalog->Publisher != '' ? $item->catalog->Publisher : '-',
						'publish_location'=>$item->catalog->PublishLocation != null && $item->catalog->PublishLocation != '' ? $item->catalog->PublishLocation : '-',
						'publish_year'=>$item->catalog->PublishYear != null && $item->catalog->PublishYear != '' ? $item->catalog->PublishYear : '-',
						'subject'=>$item->catalog->Subject != null && $item->catalog->Subject != '' ? $item->catalog->Subject : '-',
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
				
			echo CJSON::encode($return);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionRun()
	{
		if(Yii::app()->request->isPostRequest) {
			$id = trim($_POST['id']);
			$catalog = trim($_POST['catalog']);
			$token = trim($_POST['token']);
			
			if($id != null && $id != '') {
				$model=InlisLikes::model()->findByPk($id);
				
				if($model != null && $model->publish == 1 && $model->user->view->token_password == $token) {
					$model->publish = 0;
					if($model->update()) {
						$return = array(
							'success'=>'1',
							'message'=>'success, like berhasil dihapus',
						);						
					}
				} else
					$return = $this->toggle($catalog, $token);
			} else
				$return = $this->toggle($catalog, $token);
			
			echo CJSON::encode($return);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function toggle($catalog, $token)
	{
		$user = ViewUsers::model()->findByAttributes(array('token_password' => $token), array(
			'select' => 'user_id',
		));
		
		if($user != null) {
			$criteria=new CDbCriteria;
			$criteria->with = array(
				'user.view' => array(
					'alias'=>'view',
				),
			);
			$criteria->compare('t.publish',1);
			$criteria->compare('t.catalog_id',$catalog);
			//$criteria->compare('view.token_password',$token);
			$criteria->compare('t.user_id',$user->user_id);
			$model = InlisLikes::model()->find($criteria);
			
			if($model != null) {
				$model->publish = 0;
				if($model->save()) {
					$return = array(
						'success'=>'1',
						'message'=>'success, like berhasil dihapus',
					);					
				}
			} else {
				$like=new InlisLikes;
				$like->catalog_id = $catalog;
				$like->user_id = $user->user_id;
				if($like->save()) {
					$return = array(
						'success'=>'1',
						'message'=>'success, like berhasil ditambahkan',
					);					
				}					
			}
			
		} else {
			$return = array(
				'success'=>'0',
				'error'=>'USERNULL',
				'message'=>'error, user tidak ditemukan',
			);
		}
		
		return $return;		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = InlisLikes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='inlis-likes-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
