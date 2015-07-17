<?php
	#http://localhost/Publico/Practicas/yii/facilito/hola/index
	class HolaController extends Controller
	{
		public function actionIndex()
		{
			$model = Users::model()->findAll();
			$twitter = '@MoroGasperTKD';
			$this->render("index", array("model"=>$model, "twitter"=>$twitter));
		}
	}
?>