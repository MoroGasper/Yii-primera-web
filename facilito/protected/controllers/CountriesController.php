<?php
	class CountriesController extends Controller
	{
		public function actionIndex()
		{
			#Yii::app()->user->setFlash("error","This is message error Ja Ja Ja");
			#Yii::app()->user->setFlash("info","This is message error Ja Ja Ja");
			#echo Yii::app()->happy->hi()."<br>";
			#Yii::app()->happy->trato=null;
			#echo Yii::app()->happy->hi()."<br>";

			$countries=Countries::model()->findAll();
			$this->render("index", array("countries"=>$countries));
		}

		public function actionCreate()
		{
			$model=new Countries();
			if (isset($_POST["Countries"]))
			{
				$model->attributes=$_POST["Countries"];
				if ($model->save())
				{
					Yii::app()->user->setFlash("success","Country guardado correctamente.");
					$this->redirect(array("index"));
				}
			}
			$this->render("create", array("model"=>$model));
		}

		public function actionUpdate($id)
		{
			$model=Countries::model()->findByPk($id);
			if (isset($_POST["Countries"]))
			{
				$model->attributes=$_POST["Countries"];
				if ($model->save())
				{
					Yii::app()->user->setFlash("success","Actualizado.");
					$this->redirect(array("index"));
				}
				else
				{
					Yii::app()->user->setFlash("error","No se Actualizó.");
				}#
			}
			$this->render("update", array("model"=>$model));
		}

		public function actionDelete($id)
		{
			$model=Countries::model()->deleteByPk($id);
			$this->redirect(array("index"));
		}

		public function actionView($id)
		{
			$model=Countries::model()->findByPk($id);
			$this->render("view",array("model"=>$model));
		}

		public function actionEnabled($id)
		{
			$model=Countries::model()->findByPk($id);
			if ($model->status==1)
			{
				$model->status=0;
			} else {
				$model->status=1;
			}
			$model->save();
			$this->redirect(array("index"));
		}
	}
?>