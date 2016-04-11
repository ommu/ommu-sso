<?php
/**
 * SearchController
 * @var $this SearchController
 * @var $model InlisSearchs
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	List
 *	Run
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 11 April 2016, 03:25 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class SearchController extends Controller
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
			$toolbar = trim($_POST['toolbar']);
			
			$criteria=new CDbCriteria;
			$criteria->with = array(
				'user.view' => array(
					'alias'=>'view',
				),
			);
			$criteria->select = array('t.search_id','t.search_type','t.search_key');
			$criteria->compare('t.publish',1);
			$criteria->compare('view.token_password',$token);
			$criteria->group = 't.search_key';
			$criteria->order = 't.creation_date DESC';
			if($toolbar != null && $toolbar != '' && $toolbar == 'true')
				$criteria->limit = 5;
			
			if($toolbar != null && $toolbar != '' && $toolbar == 'true')
				$model = InlisSearchs::model()->findAll($criteria);
				
			else {
				$dataProvider = new CActiveDataProvider('InlisSearchs', array(
					'criteria'=>$criteria,
					'pagination'=>array(
						'pageSize'=>20,
					),
				));			
				$model = $dataProvider->getData();				
			}
			
			$data = '';
			if(!empty($model)) {
				foreach($model as $key => $item) {					
					$data[] = array(
						'search_id'=>$item->search_id,
						'search_type'=>$item->search_type,
						'search_key'=>$item->search_key,
					);					
				}
			} else
				$data = array();
		
			if($toolbar == null && $toolbar != '' && $toolbar == 'true') {
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
				echo CJSON::encode($data);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionRun()
	{
		if(Yii::app()->request->isPostRequest) {
			$token = trim($_POST['token']);
			$id = trim($_POST['id']);
			
			if($id != null && $id != '') {
				$model=InlisSearchs::model()->findByPk($id);
				
				if($model != null && $model->publish == 1) {
					if($model->user->view->token_password == $token) {
						$model->publish = 0;
						if($model->update()) {
							$return = array(
								'success'=>'1',
								'message'=>'success, search history berhasil dihapus',
							);
						} else {
							$return = array(
								'success'=>'0',
								'message'=>'success, search history tidak berhasil dihapus',
							);							
						}					
					} else {
						$return = array(
							'success'=>'0',
							'error'=>'USERERROR',
							'message'=>'error, user tidak diizinkan untuk menghapus',
						);
					}
				} else {
					$return = array(
						'success'=>'0',
						'error'=>'NULL',
						'message'=>'error, search tidak dalam kondisi search',
					);
				}
			} else {
				$return = array(
					'success'=>'0',
					'error'=>'IDNULL',
					'message'=>'error, id tidak ditemukan',
				);
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
		$model = InlisSearchs::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='inlis-searchs-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
