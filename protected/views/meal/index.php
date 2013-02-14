<h1 style="text-align: center">Sign up for a meal!</h1>

<div class="btn-group" style="width:600px; display:block; overflow: visible; margin: 40px auto">
    <a href="#hostModal" data-toggle="modal" class="btn btn-large btn-primary">I am hosting a meal this shabbat</a>
    <a href="#clientModal" data-toggle="modal" class="btn btn-large btn-info">I need a meal this shabbat</a>
</div>


<div id="hostModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Host" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Hosting - Shabbat, February 23</h3>
  </div>
  <div class="modal-body host-modal">
    <?php /** @var BootActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'type'=>'vertical',
        'htmlOptions'=>array('class'=>'well'),
        )); ?>
      
    <?php echo $form->textFieldRow($meal, 'host', array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($meal, 'email', array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($meal, 'password', array('class'=>'span3', 'append'=>'<a href="#" rel="tooltip" title="When you come back to the site, you\'ll need this to get back to your invites"><i class="icon-question-sign"></i></a>')); ?>
    <?php echo $form->textFieldRow($meal, 'limit', array('class'=>'span1')); ?>
      
      <label class="checkbox" for="Meals_choices_0">
          <input name="Meals[choices][pick]" id="Meals_choices_0" value="1" checked="checked" type="checkbox" disabled="true">
          Choose <a href="#" rel="tooltip" title="After signing up, you\'ll be shown a list of all the NYU students that need a meal this week. Feel free to invite any of them through the site. We\'ll shoot them an e-mail for you."><i class="icon-question-sign"></i></a>
      </label>
      <label class="checkbox" for="Meals_choices_1">
          <input name="Meals[choices][listed]" id="Meals_choices_1" value="1" type="checkbox">
          Be Chosen <a href="#" rel="tooltip" title="On the reverse side, if you check this box, students looking for a meal on the site will see your name on a list of hosts for this week. They can then ask you for an invite."><i class="icon-question-sign"></i></a>
      </label>
      <label class="checkbox" for="Meals_choices_2">
          <input name="Meals[choices][random]" id="Meals_choices_2" value="1" type="checkbox">
          Let God Decide <a href="#" rel="tooltip" title="My favorite. If you check this box, if by Thursday night you haven\'t hit your limit, we\'ll throw you a few students who still need a meal. Any requests can be put in the notes below."><i class="icon-question-sign"></i></a>
      </label>
    <?php /*echo $form->checkBoxListRow($meal, 'choices', array(
        'pick'=>'Choose <a href="#" rel="tooltip" title="After signing up, you\'ll be shown a list of all the NYU students that need a meal this week. Feel free to invite any of them through the site. We\'ll shoot them an e-mail for you."><i class="icon-question-sign"></i></a>',
        'listed'=>'Be Chosen <a href="#" rel="tooltip" title="On the reverse side, if you check this box, students looking for a meal on the site will see your name on a list of hosts for this week. They can then ask you for an invite."><i class="icon-question-sign"></i></a>',
        'random'=>'Let God Decide <a href="#" rel="tooltip" title="My favorite. If you check this box, if by Thursday night you haven\'t hit your limit, we\'ll throw you a few students who still need a meal. Any requests can be put in the notes below."><i class="icon-question-sign"></i></a>',
    )); */?>
    <?php echo $form->textAreaRow($meal, 'notes', array('class'=>'span5', 'rows'=>3)); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'Done!', 'size'=>'large','icon'=>'ok')); ?>

    <?php $this->endWidget(); ?>
  </div>
</div>



<div id="userModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Client" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Client</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>