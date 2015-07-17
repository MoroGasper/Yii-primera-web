<?php

	class JGHappy extends CApplicationComponent
	{
		public $trato;

		public function init()
		{
			echo "Inicializando JGHappy<br>";
		}

		public function hi()
		{
			if ($this->trato===null)
				return " Buenas como esta usted";
			if ($this->trato===1)
				return " Hola que hay";

		}
	}
?>