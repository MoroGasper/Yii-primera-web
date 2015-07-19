<?php
	class RoleForm extends CFormModel
	{
		public static $types=array("Operation","Task","Role");
		public $name;
		public $description;
		public $type=2;

		public function rules()
		{
			return array(
				array("name, type", "required", "message"=>"Esta mall el {attribute}"),
				#array("description", "ext.MyValidator"),
				array("description", "validando"),
			);
		}

		public function validando($attribute, $params)
		{
			if ($this->$attribute=="test") {
				$this->addError($attribute, "Esto no puede ser TEST."); 	
			}
		}
	}
?>