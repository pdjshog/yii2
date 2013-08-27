<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		if (@$_GET['view']=='admin'){
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
							'condition'=>'status>'.User::STATUS_BANNED,
							'condition'=>'superuser=1',
							),
						'pagination'=>array(
							'pageSize'=>Yii::app()->controller->module->user_page_size,
							),
						));

		} else {
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
							'condition'=>'status>'.User::STATUS_BANNED,
							'condition'=>'superuser=0',
							),
						'pagination'=>array(
							'pageSize'=>Yii::app()->controller->module->user_page_size,
							),
						));
			
			}
		
		
		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

}