<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 <fieldset>
 
    <legend>News Item</legend>
<?php echo $form->textFieldRow($model, 'title', array('class'=>'span3')); ?>
<?php echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5)); ?>
    
 </fieldset>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Insert','type'=>'primary')); ?>
</div> 
<?php $this->endWidget(); ?>