<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

	<div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php
			$this->widget("zii.widgets.jui.CJuiDatePicker",array(
					"attribute"=>"birthday",
					"model"=>$model,
					"language"=>"es",
					"options"=>array(
						'showButtonPanel'=>true,
						'changeYear'=>true,
						'changeYear'=>true,
						'dateFormat'=>'yy-mm-dd',
						'yearRange'=>'-80:-10',
						'minDate'=>'-80Y',
						'maxDate'=>'-10Y',
					)
				));
		?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div>
		<?php
			$htmlOptions=array(
				"ajax"=>array(
					"url"=>$this->createUrl("citiesByCountry"),
					"type"=>"POST",
					"update"=>"#Users_cities_id",
				),
				"empty"=>"Seleccione",
			);
		?>
		<?php echo $form->labelEx($model,'countries_id'); ?>
		<?php #echo $form->dropDownList($model,'countries_id',CHtml::listData(Countries::model()->findAll(),"id","selectName")); array("empty"=>"Seleccione") ?>
		<?php echo $form->dropDownList($model,'countries_id',$model->getMenuCountries(),$htmlOptions); ?>
		<?php echo $form->error($model,'countries_id'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->dropDownList($model,'cities_id',$model->getMenuCities($model->countries_id), array("empty"=>"Seleccione")); ?>
		<?php #echo $form->textField($model,'cities_id'); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->