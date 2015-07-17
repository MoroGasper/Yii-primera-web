<h1>Actualizando el Country #<?php echo $model->id; ?></h1>
<?php $form=$this->beginWidget("CActiveForm"); ?>

<b>Nombre</b><br>
<?php echo $form->textField($model, "name"); ?>
<?php echo $form->error($model, "name"); ?>
<br>
<b>Status</b><br>
<?php echo $form->textField($model, "status"); ?>
<?php echo $form->error($model, "status"); ?>
<br>
<?php echo CHtml::submitButton("Actualzar", array("class"=>"btn btn-primary btn-large")); ?>
<?php $this->endWidget(); ?>