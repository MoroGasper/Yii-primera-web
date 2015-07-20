<?php
	class CountriesController extends Controller
	{
		public function actionIndex()
		{
			//Creando Role y asignando usuario
			#Yii::app()->authManager->createRole("admin");
			#Yii::app()->authManager->assign("admin",1);
			/*if (Yii::app()->authManager->checkAccess("admin", Yii::app()->user->id)) {
				echo "Hola desde authManager";
			}*/
			#echo Yii::app()->user->id;
			// if (Yii::app()->user->checkAccess("admin")) {
			// 	echo "Hola";
			// }

			//Exportar excel si existe la solicitud get
			if (isset($_GET["excel"]))
			{
				$model = Countries::model()->findAll();
				$content = $this->renderPartial("excel", array("model"=>$model), true);
				Yii::app()->request->sendFile("Countries.xls", $content);
			}

			//Mostrar los datos de la tabla countries
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
				}
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
			//Mostrar detalle del registro seleccionado
			$model=Countries::model()->findByPk($id);
			$this->render("view",array("model"=>$model));
		}

		public function actionEnabled($id)
		{
			//Cambiar valor del campo(status) en la tabla(countries) del registro seleccionado
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