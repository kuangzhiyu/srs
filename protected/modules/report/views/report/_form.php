<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<!--
	<?php echo CHtml::activeLabelEx($model,'date'); ?>
    <?php echo CHtml::activeTextField($model,'date',array("id"=>"date")); ?>
    <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date',
		'ifFormat'=>'%Y-%m-%d',
    ));
    ?>
	-->
	<?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_id'); ?>
		<?php echo $form->textField($model,'task_id'); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>
	
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->hiddenField($model,'is_draft'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->