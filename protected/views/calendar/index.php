<?php Yii::app()->clientScript->registerCssFile('http://arshaw.com/js/fullcalendar-1.5.4/demos/cupertino/theme.css',  CClientScript::POS_HEAD); ?>    
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/fullcalendar.css',  CClientScript::POS_HEAD); ?>    
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/fullcalendar.print.css',  CClientScript::POS_HEAD); ?>    
<?php Yii::app()->clientScript->registerScriptFile('http://arshaw.com/js/fullcalendar-1.5.4/jquery/jquery-ui-1.8.23.custom.min.js',  CClientScript::POS_HEAD); ?>    
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/fullcalendar.min.js',  CClientScript::POS_HEAD); ?>    
<?php Yii::app()->clientScript->registerScript('myCalendar',"
	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			events: [".
                            $events
			."]
		});
		
	});
",  CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCss('calendar','#calendar {width: 900px;margin: 0 auto;}',  CClientScript::POS_HEAD);?>
<div style="padding-top:10px"></div>
<div id='calendar'></div>